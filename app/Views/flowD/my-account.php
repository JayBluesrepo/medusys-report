<?php
    echo view('includes/flow-header');    
?>

<section class="my-account">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                 <div class="menu-left">
                    <ul>
                        <li><a href="" class="active">My  Account</a></li> 
                    </ul>
                </div>
                 <div class="go-back">
                    <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="account-right" style="padding: 30px 10% 0 0;">
                <div class="account-form">
                    <form id="myaccount">
                        <label>Select</label>
                        <div class="form-group" id="doctor-drop" style="width: 20%;">
                          <select class="form-control" id="">
                            <option>Doctor</option>
                            <option></option>
                            <option></option>
                            <option></option>
                          </select>
                        </div>
                        <div class="account-form-1">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="f_name" value="<?php echo $myaccount['f_name']; ?>">
                                </div>
                                <div class="col-sm-6">
                                     <label>Last Name</label>
                                    <input type="text" class="form-control" name="l_name" value="<?php echo $myaccount['l_name']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" id="password" name="old_password">
                                    <div class="input-group-append" id="eye-flow" style="margin-top: -25px;margin-left: 260px;">
                                        <span onclick="password_show_hide2();">
                                            <i class="fa fa-eye d-none" id="hide_eye2"></i>
                                            <i class="fa fa-eye-slash" id="show_eye2"></i>
                                        </span>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" id="password1" name="new_password">
                                    <div class="input-group-append" id="eye-flow" style="margin-top: -25px;margin-left: 260px;">
                                        <span onclick="password_show_hide();">
                                            <i class="fa fa-eye d-none" id="hide_eye"></i>
                                            <i class="fa fa-eye-slash" id="show_eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                     <label>Confirm Password</label>
                                    <input type="password" class="form-control" id="password2" name="confirm_password">
                                    <div class="input-group-append" id="eye-flow" style="margin-top: -25px;margin-left: 260px;">
                                        <span onclick="password_show_hide1();">
                                            <i class="fa fa-eye d-none" id="hide_eye1"></i>
                                            <i class="fa fa-eye-slash" id="show_eye1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Mobile</label><br>
                                    <input type="text" id="phone" name="phone" class="form-control" name="mobile" value="<?php echo $myaccount['mobile']; ?>">
                                </div>
                                <div class="col-sm-6">
                                     <label>Email</label>
                                    <input type="email" class="form-control" id="mob-email" name="email" value="<?php echo $myaccount['email']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Hospital</label>
                                    <input type="text" class="form-control" name="hospital" value="<?php echo $myaccount['hospital']; ?>">
                                </div>
                                <div class="col-sm-6">
                                     <label>City</label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $myaccount['city']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Country</label><br>
                                    <input type="text" class="form-control" id="country_selector" name="country" value="<?php echo $myaccount['contry']; ?>">
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <button type="submit" class="btn-update">Update</button>
                        </div>

                    </form>
                    <!-- <button class="btn-update" onclick="myfun()" data-toggle="modal" >Change Password</button> -->

                    
  

                </div><!--account-form-->               

            </div><!--account-right-->
        </div><!--col--10-->
    </div><!--row-->
</section>



<?php
    echo view('includes/flow-footer');    
?>

    <script type="text/javascript">
        function password_show_hide() {

            var x = document.getElementById("password1");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
        function password_show_hide1() {

            var x = document.getElementById("password2");
            var show_eye = document.getElementById("show_eye1");
            var hide_eye = document.getElementById("hide_eye1");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
        function password_show_hide2() {

            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye2");
            var hide_eye = document.getElementById("hide_eye2");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>


<script type="text/javascript" src="<?php echo base_url('public/assets/js/intlTelInput.js'); ?>"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      autoPlaceholder: "on",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "public/assets/js/utils.js",
    });
  </script>

  <script type="text/javascript" src="<?php echo base_url('public/assets/js/countrySelect.js'); ?>"></script>
    <script type="text/javascript">
        $("#country_selector").countrySelect();
    </script>


<script>
    $('#myaccount').submit(function(e){
        e.preventDefault();
        password1,password2
        var aa = '', bb = '';
        var password1 = $('#password1').val();
        var password2 = $('#password2').val();
       
        if(password1 != ''){
            aa = true;
        }
        else{           
            toastr.error('please enter new password');
        }

        if(password2 != ''){
            bb = true;
        }
        else{           
            toastr.error('please enter confirm new password');
        }

        if(aa && bb){
            var formData = new FormData(this);
            $.ajax({
                type : 'POST',
                url : '<?php  echo base_url("My-Account-update")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
                        $('#myaccount')[0].reset();

                        // $("#csa_modal_update").modal("hide");
                        // $('.update').removeAttr("disabled");
                        // $(".update").text("Save");
                        history.go(0); 
                    }
                    else{
                        toastr["error"](response.message);
                        // $('.update').removeAttr("disabled");
                        // $(".update").text("Update");
                    }
                }

            });
        }
        
    });

    // function myfun(){
    //     // alert('hi');
    //     $("#password-update").modal("show");

    //     $('#change_password').submit(function(e){
    //         e.preventDefault();
    //         var formData = new FormData(this);
    //         $.ajax({
    //             type : 'POST',
    //             url : '<?php echo site_url("update-password") ?>',
    //             data : formData, 

    //             contentType: false,
    //             processData: false,
    //             success:function(response){
    //                 response = jQuery.parseJSON(response);
    //                 // console.log(response);
    //                 if(response.result== 1){
    //                     $("#password-update").modal("hide");
    //                     toastr["success"](response.message);
    //                     $('#change_password')[0].reset();
    //                     // $('#password-update').reset();

    //                 }
    //                 else{
    //                     toastr["error"](response.message);
    //                 }   
    //             }
    //         });
    //     });

    // }
</script>

