using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Net.Mail;
using System.Web;
using System.Web.Services;
using System.Web.UI;
using System.Web.UI.WebControls;
using VNGT.RAD.Windows.BLL.BusinessLogic;
using VNGT.RAD.Windows.BLL.Models;
using VNGT.RAD.Windows.BLL.Helper;

public partial class UserRegistrationForm : System.Web.UI.Page
{
    public string redirectURL = ConfigurationManager.AppSettings["redirecturl"].ToString();
    public string cancelURL = ConfigurationManager.AppSettings["cancelurl"].ToString();
    public string userid = "";
    public string MerchantID = ConfigurationManager.AppSettings["merchantid"].ToString();
    public string OrderID = DateTime.Now.Ticks.ToString();
    public string Domain = "";

    public string emailid = "", FirstName = "", Designation = "", LastName = "", Department = "", Hospital = "", MobileNo = "", Password = "", ConfirmPassword = "", domain = "";

    protected void Page_Load(object sender, EventArgs e)
    {

        if (!this.IsPostBack)
        {
            string id = Request.QueryString["id"] as string;
            if (id != null)
            {
                if (domain == null || domain == "")
                    domain = "RADEntities";

                domain = "Trial";
                User usr = new UserRepository().GetUserByUserID(Convert.ToInt32(id), domain);

                ddtitle.Value = usr.Title;
                FirstName = usr.FirstName;
                Designation = usr.Designation;
                LastName = usr.LastName;
                Department = usr.UserDepartment;
                Hospital = usr.Hospital;
                emailid = usr.Email;
                MobileNo = usr.ContactNumber;
            }
            else
            {
                FirstName = Session["FirstName"].ToString();
                LastName = Session["LastName"].ToString();
                emailid = Session["EmailID"].ToString();
            }
        }
    }

    protected string Clients { get; set; }

    protected void btnsubmit_Click(object sender, EventArgs e)
    {
        //Button1.Enabled = false;
    }

    [WebMethod]
    public static long CheckIfUserWithSameNameExists(string username, string domain)
    {
        
        long result = new UserRepository().CheckIfUserExists(username, domain);
        if (result != 0)
            result =  new UserRepository().CheckRegisterationMode(username, domain);
        return result;
    }

    

    //For paid registration
    [WebMethod]
    public static long RegisterUser(string title, string firstname, string middlename, string lastname, string username, string password, string designation, string department, string hospital, string domain, string contactnumber, string country, string state,bool multiusermode,bool  isadmin, int maxusers)
    {
        long result = 0;
        if (domain == null || domain == "")
            domain = "RADEntities";

        domain = "Paid";

        UserModel uModel = new UserModel();
        uModel.Title = title;
        uModel.FirstName = firstname;
        uModel.MiddleName = middlename;
        uModel.LastName = lastname;
        uModel.PasswordHash = password;// new VNGT.RAD.Windows.BLL.Helper.Encryption().GetPasswordHash(password);
        uModel.UserName = username;
        uModel.Designation = designation;
        uModel.Department = department;
        uModel.Designation = designation;
        uModel.Domain = domain;
        uModel.Email = username;
        uModel.Hospital = hospital;
        uModel.Role = "User";
        uModel.ContactNumber = contactnumber;
        uModel.ActiveUser = true;
        uModel.MultiUserMode = multiusermode;
        uModel.isAdmin = isadmin;
        uModel.MaxUsers = maxusers;

        uModel.Country = country;
        uModel.State = state;
        result = new UserRepository().CheckIfUserExists(username, domain);
        if (result != 0)
        {
            uModel.PasswordHash = new VNGT.RAD.Windows.BLL.Helper.Encryption().GetPasswordHash(password);
            uModel.UserID = Convert.ToInt16(result);
            new UserRepository().UpdateUserDetail(uModel, uModel.Domain);
        }
        else
        {
            UserRepository rep = new UserRepository();
            int userid = rep.CreateNewUser(uModel, 0, "");
            int BossUserID = Convert.ToInt32(ConfigurationManager.AppSettings[domain + "BossUserId"]);
            rep.AddHierarchy(userid, BossUserID, domain);
            if (multiusermode)
            {
                GroupsRepository gp = new GroupsRepository();
                GroupsModel.AddEditGroupModel mod = new GroupsModel.AddEditGroupModel();
                mod.GroupDescription = "Group automatically created for MultiUser mode for UserId= " + userid + " at UTC " + DateTime.UtcNow;
                mod.GroupName = "Group_" + hospital + "_" + DateTime.UtcNow;
                int groupid = gp.CreateorEditGroup(mod, domain);

                string[] users = new string[1];
                users[0] = userid.ToString();
                gp.AddUsersToGroup(users, groupid, domain);
            }
            result = userid;
        }
        return result;
    }

    //For trial registration
    [WebMethod]
    public static long RegisterTrialUser(string title, string firstname, string middlename, string lastname, string username, string password, string designation, string department, string hospital, string domain, string contactnumber, string country, string state)
    {
        long result = 0;
        if (domain == null || domain == "")
            domain = "RADEntities";

        domain = "Trial"; //For Trial instance

        UserModel uModel = new UserModel();
        uModel.Title = title;
        uModel.FirstName = firstname;
        uModel.MiddleName = middlename;
        uModel.LastName = lastname;
        uModel.PasswordHash = password;// new VNGT.RAD.Windows.BLL.Helper.Encryption().GetPasswordHash(password);
        uModel.UserName = username;
        uModel.Designation = designation;
        uModel.Department = department;
        uModel.Designation = designation;
        uModel.Domain = domain;
        uModel.Email = username;
        uModel.Hospital = hospital;
        uModel.Role = "User";
        uModel.ContactNumber = contactnumber;
        uModel.ActiveUser = true;
        uModel.Country = country;
        uModel.State = state;
        result = new UserRepository().CheckIfUserExists(username, domain);
        if (result != 0)
        {
            uModel.PasswordHash = new VNGT.RAD.Windows.BLL.Helper.Encryption().GetPasswordHash(password);
            uModel.UserID = Convert.ToInt16(result);
            new UserRepository().UpdateUserDetail(uModel, uModel.Domain);
        }
        else
        {
            UserRepository rep = new UserRepository();
            int userid = rep.CreateNewUser(uModel, 0, "trial");
            int BossUserID = Convert.ToInt32(ConfigurationManager.AppSettings[domain + "BossUserId"]);
            rep.AddHierarchy(userid, BossUserID, domain);
            result = userid;
            //send mail
            SendEmail(domain, userid);
        }
        return result;
    }

    private static void SendEmail(string domain, long userid)
    {
        string Body = "";
        string username = new UserRepository().GetuserName(userid, domain);
        string playstorelink = ConfigurationManager.AppSettings["playstorelink"];
        string applestorelink = ConfigurationManager.AppSettings["applestorelink"];
        string SenderMailId = ConfigurationManager.AppSettings["SenderMailId"];
        // string SenderPassword = ConfigurationManager.AppSettings["SenderMailIdPwd"];
        MailMessage mail = new MailMessage();
        mail.To.Add(username);
        mail.From = new MailAddress("contact@medusys.in", "RAD Login Credentials");
        mail.Subject = "RAD Access as Trial User";
        mail.IsBodyHtml = true;
        //mail.Body = "Thank You For Registering To RAD" + "<br/>" + "Login URL : " +  + "<br/>" + "UserName : " + username + "<br/>" +
        //    "Play Store Link : " + playstorelink + "<br/>" + "Apple Store Link : " + applestorelink;

        Body = "Hello Doctor," + "<br/>"
        + " We would like to thank you for choosing RAD App as a " + "<b>" + "trial user" + "</b>" +", which is a e-clinical audit app for improving quality and safety. RAD comes with a range of features to improve your efficiency in providing quality health care and practice management." + "<br/>" + "<br/>" +

        "<b style=\"color:red\"><u>" + "Do note that as a trial user, you can enter only upto 25 cases. For unlimited access, please upgrade to paid subscription. " + "</u></b>" + "<br/>" + "<br/>" +

        " Please find the instructions below to proceed with the use of App and Website." + "<br/>" + "<br/>" +

       "<b><u>" + "Installation of App in your Android or Apple mobile/tablet" + "</u></b>" + "<br/>" +
        "1. Search for MEDUSYS in Google Play Store or App store"  + "<br/>" +
        "2. Click on the RAD App and install" + "<br/>" +
        "3. Open the app after installation" + "<br/>" +
        "4. In the login Page, type the username and password to login." + "<br/>" +
        "5. App will provide the users, ability to key-in information from large number of patients; including complete peri-operative care data in peripheral nerve blocks along with patient related outcomes." + "<br/>" +
        "6. Refer to user manual for further instructions on usage of App and more details." + "<br/>" + "<br/>" +

        "<b><u>" + "Website Use" + "</u></b>" + "<br/>" +
        "1. " + "Open the link," + "<b>" + " http://trial.medusys.in/client" + "</b>" + " " + "in your web browser" + "<br/>" +
        "2. Login with your user name and password." + "<br/>" +
        "3. You will have the option of performing data input through website interface as well" + "<br/>" +
        "4. You will also have the ability to generate customizable reports for various data queries on outcomes and other modules like block characteristics, etc." + "<br/>" +
        "5. Refer to user manual for further instructions on usage of Website and more details." + "<br/>" + "<br/>" +

        "<b><u>" + "To upgrade to paid version" + "</u></b>" + "<br/>" +
        "1. Click on Menu button in the RAD App (on the top left of home page)." + "</b>" + "<br/>" +
        "2. Click on Upgrade." + "<br/>" +
        "3. An Alert will pop up for confirmation to proceed to paid subscription." + "<br/>" +
        "4. Click OK to proceed" + "<br/>" +
        "5. Registration page will open with your details. You can proceed with same information or edit your login details" + "<br/>" +
        "6. Make payment for paid subscription and obtain new login details." + "<br/>" +
        "7. Logout from current App and login with new credentials." + "<br/>" + "<br/>" +

        "Thank you again for your time and consideration. Looking forward to the great opportunities together. Should you have any questions, please write to us at contact@medusys.in" + "<br/>" + "<br/>"
        + "Regards" + "<br/>"
        + "Medusys team" + "<br/>";

        // MailAddress rt = new MailAddress("nithya@vibgyornextgen.com");

        mail.Body = Body;

        SmtpClient smtp = new SmtpClient();
        smtp.Host = "smtp.gmail.com";
        smtp.Credentials = new System.Net.NetworkCredential("contact@medusys.in", "Medusys12345");
        // Set the one email id and its password for authentication )
        // email goes via using above email id...

        smtp.Port = 587;
        smtp.EnableSsl = true;
        try
        {
            smtp.Send(mail);
        }
        catch (Exception ex)
        {
        }
    }
}