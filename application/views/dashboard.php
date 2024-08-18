
		<!--=== Profile ===-->
		<div class="container content profile">
			<div class="row">
				<!--Left Sidebar-->
				<div class="col-md-3 md-margin-bottom-40">
					<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
						<li class="list-group-item " style="background-color: #72c02c; color: white" >
						<center>
							<span style="font-size: 20px">Kecepatan Angin</span>
							<div><span id="wind" style="font-size: 70px">--</span><span> mph</span></div>
						</center>
						</li>
						<li class="list-group-item">
							<center>
							<span style="font-size: 20px">Kelembaban</span>
							<div><span id="humidity" style="font-size: 70px">--</span><span> %</span></div>
						</center>
						</li>
						<li class="list-group-item">
							<center>
							<span style="font-size: 20px">Temperatur</span>
							<div><span id="temperature" style="font-size: 70px">--</span><span> °C</span></div>
						</center>
						</li>
						
					</ul>

			

					<!--Notification-->
					<!--End Datepicker-->
				</div>
				<!--End Left Sidebar-->

				<!-- Profile Content -->
				<div class="col-md-9">
					<div class="" style="overflow:scroll; height: 500px">
						<!--Timeline-->
						<div class="alert alert-danger fade in" hidden="true">
							<strong>Bahaya!</strong> Kecepatan Angin Diatas Batas Aman.
						</div>
						<div class="panel panel-profile">
							<div class="panel-body margin-bottom-40">
								<ul class="timeline-v2 timeline-me" id="content_list">
									
								</ul>
							</div>
						</div>
						</div>
				</div>
				<!-- End Profile Content -->
			</div>
		</div>
		<!--=== End Profile ===-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
	<script type="text/javascript" src="assets/plugins/circles-master/circles.js"></script>
	<script type="text/javascript" src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="assets/js/custom.js"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="assets/js/app.js"></script>
	<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/circles-master.js"></script>
	<script type="text/javascript" src="assets/js/plugins/style-switcher.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			App.initScrollBar();
			Datepicker.initDatepicker();
			CirclesMaster.initCirclesMaster1();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	<script type="text/javascript">
	function list(){	
		$.ajax({
            url: "Ajax/booking_list",
            type: 'GET',
            dataType: 'text',
            success: function (data) {
            	// console.log(data.observations[0].imperial.temp);
                $('#content_list').html(data);      
                console.log(data);      
            }
        });
	}
	function wunder(){
		$.ajax({
            url: "https://api.weather.com/v2/pws/observations/current?stationId=IMAKAS3&format=json&units=e&apiKey=4dd9c44d5243495099c44d5243c95038",
            type: 'GET',
            dataType: 'json',
            success: function (data) {
            	// console.log(data.observations[0].imperial.temp);
                $('#wind').html(data.observations[0].imperial.windSpeed);
                $('#humidity').html(data.observations[0].humidity);
                $('#temperature').html(Math.round((parseInt(data.observations[0].imperial.temp)-32)*5/9));
            }
        });
	}
	list();
	wunder();
	setInterval(function(){ 
		list();
		wunder();
	}, 30000);
	</script>
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.js"></script>
	<script src="assets/plugins/html5shiv.js"></script>
	<script src="assets/plugins/placeholder-IE-fixes.js"></script>
	<![endif]-->

</body>
</html>


