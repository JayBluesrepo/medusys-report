</div><!--row-->
	</section>

</body>

</html>

<script>
		


			var count = '<?php echo session()->get('total'); ?>';


		if(count == '0'){

			toastr.error("No Data Found");
		}
		
</script>