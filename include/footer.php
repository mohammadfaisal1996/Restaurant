
		<!-- Custom template | don't include it in your project! -->
		<?php 

		if(basename($_SERVER['PHP_SELF']) != "login.php"){
			?>
				<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="dark"></button>
					
						</div>
					</div>
					<div id="ohsnap"></div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
	
		</div>
		<?php
		}
	
         ?>
		<!-- End Custom template -->
	</div>
</div>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Moment JS -->
<!-- <script src="assets/js/plugin/moment/moment.min.js"></script> -->

<!-- Chart JS -->
<!-- <script src="assets/js/plugin/chart.js/chart.min.js"></script> -->

<!-- jQuery Sparkline -->
<!-- <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> -->

<!-- Chart Circle -->
<!-- <script src="assets/js/plugin/chart-circle/circles.min.js"></script> -->

<!-- Datatables -->
<!-- <script src="assets/js/plugin/datatables/datatables.min.js"></script> -->

<!-- Bootstrap Notify -->


<!-- Bootstrap Toggle -->
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>


<!-- Google Maps Plugin -->
<script src="assets/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





<!-- Azzara JS -->
<script src="assets/js/ready.min.js"></script>



<!-- jQuery Scrollbar -->
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- jQuery Vector Maps
<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>

<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script> -->



<!-- Azzara DEMO methods, don't include it in your project! -->
<!-- <script src="assets/js/setting-demo.js"></script>

<script src="assets/js/demo.js"></script> -->

<!-- DateTimePicker -->
<script src="assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- Select2 -->
<script src="assets/js/plugin/select2/select2.full.min.js"></script>
<!-- Bootstrap Tagsinput -->
<script src="assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>











	<script>


		// $('#datetime').datetimepicker({
		// 	format: 'MM/DD/YYYY H:mm',
		// });
		// $('#datepicker').datetimepicker({
		// 	format: 'MM/DD/YYYY',
		// });
		// $('#timepicker').datetimepicker({
		// 	format: 'h:mm A', 
		// });

		$('#basic').select2({
			theme: "bootstrap"
		});

		$('#multiple').select2({
			theme: "bootstrap"
		});

		$('#multiple-states').select2({
			theme: "bootstrap"
		});

		$('#tagsinput').tagsinput({
			tagClass: 'badge-info'
		});

		$( function() {
			$( "#slider" ).slider({
				range: "min",
				max: 100,
				value: 40,
			});
			$( "#slider-range" ).slider({
				range: true,
				min: 0,
				max: 500,
				values: [ 75, 300 ]
			});
		} );
	</script>


</body>
</html>