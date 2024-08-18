<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function booking_list()
	{
		$query = $this->db->query("SELECT * FROM booking ORDER BY time_start DESC");

		foreach ($query->result() as $row)
		{
				echo '
					<li>
						<div class="cbp_tmtime" style="margin-top:7px">'.$row->time_start.' '.$row->time_end.'</div>
						<i class="cbp_tmicon rounded-x hidden-xs"></i>
						<div class="cbp_tmlabel" style="padding-top: 17px">
							<a style="font-size:16px">'.$row->ship_name.'</a>
						</div>
					</li>
				';
		}

		// $query1 = $this->db->query("SELECT * FROM booking WHERE status=1 AND time_end<now()");
		// foreach ($query1->result() as $row)
		// {
		// }
		
	}
	function get_weather(){
		$url = "https://api.weather.com/v2/pws/observations/current?stationId=IMAKAS3&format=json&units=e&apiKey=726c64c085944a15ac64c08594ba1592";
		$ch = curl_init( $url );
		$options = array(CURLOPT_RETURNTRANSFER => true,);
		curl_setopt_array( $ch, $options );
		$result =  curl_exec($ch);
		$decoded_json = json_decode($result, true);
		$observations = $decoded_json['observations'];
		$hum = $observations[0]['humidity'];
		$imp = $observations[0]['imperial'];
		$temp = ($imp['temp'] - 32) * 5/9;
		$wind = $imp['windSpeed']/1.151;
		$press = $imp['pressure'];
		if($wind>15){
			$body = '
			<body style="font-family:verdana; font-size: 15px; font-weight: 400; color: #161c2d; background-color: white">
				<div style="margin-top: 50px;">
					<table cellpadding="0" cellspacing="0" style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; max-width: 600px; border: none; margin: 0 auto; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
						<thead>
							<tr style="background-color: red; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; letter-spacing: 1px;">
								<th scope="col"><h5 style="margin-bottom: -10px;">Warning!</h5></th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td style="padding: 24px 24px 0;">
									<table cellpadding="0" cellspacing="0" style="border: none;">
										<tbody>
										<tr>
										<td style="min-width: 130px; padding-bottom: 8px;"><center><img width=70px src="http://sisemocs.com/images/wind.png"></td>
				
											<td rowspan="2" style="font-family:verdana; vertical-align:top;">WE APOLOGIZE FOR SAFETY REASON NO ACTIVITIES/BERTH UNBERTH FOR TEMPORARY PERIODE</td>
										</tr>
										<tr>
										<td style=><center>'.number_format($wind, 2).'Kn<br><br></td>
									
										</tr>
											<!-- <tr>
												<center>
													<td style="min-width: 130px; padding-bottom: 8px;">
													<tr><td><img width=70px src="../sisemocs/images/wind.png"></td></tr>
													
												<td>WE APOLOGIZE FOR SAFETY REASON NO ACTIVITIES/BERTH UNBERTH FOR TEMPORARY PERIODE</td>
											</tr>	 -->
										</tbody>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
									© <script>document.write(new Date().getFullYear())</script> SISEMOCS.
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- Hero End -->
			</body>
			</html>
			';
			$this->Mail->mail('mfzn.zoldyck@gmail.com', 'Warning Information', $body);
			$q = $this->db->query("SELECT email FROM user");
			foreach ($q->result() as $row) {
				$this->Mail->mail($row->email, 'Warning Information', $body);
			}
			$q2 = $this->db->query("SELECT email FROM email");
			foreach ($q2->result() as $row) {
				$this->Mail->mail($row->email, 'Warning Information', $body);
			}
		}
		// echo $wind.' '.$temp.' '.$hum.' '.$press;
	}
}
