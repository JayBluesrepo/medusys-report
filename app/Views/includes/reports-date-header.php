<?php

    echo view('includes/reports-header');    
?>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
/>
<link
  rel="stylesheet"
  href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"
/>

<div class="col-sm-9" id="reports-pdf"  >
		<div class="row pt-5">
		<div class="col-sm-5">
		<label><b>From Date:</b></label>
		<input type="date"   class="form-control from_date"  name="from_date" value="<?php echo session()->get('from_date'); ?>" >
		</div>
		<div class="col-sm-5">
		<label><b>To Date:</b></label>
		<input type="date"   class="form-control to_date"  name="to_date"  value="<?php echo session()->get('to_date'); ?>">
		</div>
		<div class="col-sm-2" style="margin-top: 30px;">
		<button type="button" class="btn btn-primary" >Apply</button>
		</div>
		</div>
</div>
<script>
  $("button").click(function () {
    var from_date = "",
      to_date = "";
    from_date = $(".from_date").val();
    to_date = $(".to_date").val();
    // alert(from_date + " , " + to_date);
    $.ajax({
      type: "post",
      url: '<?php echo base_url("z")?>',
      data: { from_date: from_date, to_date: to_date },

      success: function (response) {
        response = jQuery.parseJSON(response);
        console.log(response);
        if (response.result == 1) {
          // alert(response.result);

          $("#from_date").html(response.from_date);
          $("#to_date").html(response.to_date);
          $("#reported_by").html(response.name);

    	  window.location.reload();

          var dates = response.data;
          dates.forEach(appendDate);

          function appendDate(date) {
            console.log(date);
            $("#reported_date").append(date.DATE + " , ");
          }
        } else {
      
        }
      },
    });
  });
</script>
<?php
    echo view('includes/reports-footer');    
?>