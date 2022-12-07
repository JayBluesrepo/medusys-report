                    </div>
                </div>  
            </div>
        </div>
    </section>
</body>
</html>

<script type="text/javascript"> 
    var today = new Date();
    var minDate = today.setDate(today.getDate() );

    $('#datePicker').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: 0
    });

    var firstOpen = true;
    var time;

    $('#timePicker').datetimepicker({
    useCurrent: false,
    format: "hh:mm A"
    }).on('dp.show', function() {
    if(firstOpen) {
        time = moment().startOf('day');
        firstOpen = false;
    } else {
        time = "01:00 PM"
    }
    
    $(this).data('DateTimePicker').date(time);
    });
</script>



<!-----------------active link color change---------------->
<script type="text/javascript">
	$(document).ready(function () {
      $("ul.nav > li").click(function (e) {
       $("ul.nav > li").removeClass("active");
       $(this).addClass("active");
        });
    });
	
</script>
<!-----------------active link color change---------------->

<!---------------------tooltip----------------------------->
<script type="text/javascript">
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
</script>
<!---------------------tooltip----------------------------->

<!------------------------date------------------------------>
<script type="text/javascript">
	  $('#from_date').datepicker({dateFormat: "dd-mm-yy"});
</script>
<!--------------------date---------------------------------->

<!-- --------------------------Time------------------------>
<!-- <script type="text/javascript">
	$('#mytimeicker').timepicker();
</script> -->
<!---------------------------Time------------------------->

<!------------------------------date/time------------------------->
<!-- <script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script> -->
<!---------------------------date/time------------------------- -->


