		<!-- jQuery UI 1.11.4 -->
		<script src="{{ asset('assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.7 -->
		<script src="{{ asset('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<!-- Morris.js charts -->
		<script src="{{ asset('assets/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
		<script src="{{ asset('assets/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
		<script src="{{ asset('assets/adminlte/bower_components/chart.js/Chart.js') }}"></script>
		<!-- Sparkline -->
		<script src="{{ asset('assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
		<!-- jvectormap -->
		<script src="{{ asset('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
		<script src="{{ asset('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
		<!-- jQuery Knob Chart -->
		<script src="{{ asset('assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
		<!-- daterangepicker -->
		<script src="{{ asset('assets/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
		<script src="{{ asset('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
		<!-- datepicker -->
		<script src="{{ asset('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="{{ asset('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
		<script src="{{ asset('assets/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
		<!-- Slimscroll -->
		<script src="{{ asset('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
		<!-- FastClick -->
		<script src="{{ asset('assets/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
		<!-- adminlte App -->
		<script src="{{ asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>
		<!-- adminlte dashboard demo (This is only for demo purposes) -->
		<script src="{{ asset('assets/adminlte/dist/js/pages/dashboard.js') }}"></script>
		<!-- adminlte for demo purposes -->
		<script src="{{ asset('assets/adminlte/dist/js/demo.js') }}"></script>
		<!-- Select2 -->
		<script src="{{ asset('assets/adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
		<!-- Mask -->
		
		<script type="text/javascript"> 
	      $(document).ready( function() {
	        $('#flash_message').delay(3000).fadeOut();
	      });
	    </script>

		

		@yield('layout_js')