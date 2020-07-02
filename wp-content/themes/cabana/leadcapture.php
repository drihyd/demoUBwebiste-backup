<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

date_default_timezone_set("Asia/Kolkata");
global $wpdb;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = test_input($_POST['name']);
$email = test_input($_POST['email']);
$phone = test_input($_POST['phone']);
$occupation = test_input($_POST['occupation']);
$company = test_input($_POST['company']);

$leadutmsource = $_POST['leadutmsource'];
$leadutmmedium = $_POST['leadutmterm'];
$leadutmcampaign = $_POST['leadutmcampaign'];
$leadutmterm = $_POST['leadutmterm'];
$leadutmcontent = $_POST['leadutmcontent'];

$leadqueryurl = $_POST['leadqueryurl'];
$leadpagetitle = $_POST['leadpagetitle'];
$leaduseragent = $_POST['leaduseragent'];
$ip = $_POST['leadip'];
$download_pdf=$_POST['download_pdf'];

$contacteddate = date("Y-m-d H:i:s");
$json = json_encode($_POST);
error_log($json);
if(isset($_POST['uttamisawesome']) && $_POST['uttamisawesome'] == 'uttamisawesome'){

	$table = $wpdb->prefix."tracker";
	$runquery = $wpdb->insert(
	        $table,
	        array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'occupation' => $occupation,
				'company' => $company,
				'registeredon' => $contacteddate,
				'leadip' => $ip,
				'leaduseragent' => $leaduseragent,
				'leadutmsource' => $leadutmsource,
				'leadutmmedium' => $leadutmmedium,
				'leadutmcampaign' => $leadutmcampaign,
				'leadutmterm' => $leadutmterm,
				'leadutmcontent' => $leadutmcontent,
				'leadqueryurl' => $leadqueryurl,
				'leadpagetitle' => $leadpagetitle,
				'status' => 'Lead',
				'formdata' => $json
	        )
	);
	
	
	
	
	
	
	/******** CURL method for Leadstore *********/ 		
		$input_params=array(				
								'firstname'=>$name,
								'email'=>$email,
								'phone'=>$phone,
								'city'=> '',
								'message'=>'',
								'udf1'=>'Occupation: '.$occupation,
								'udf2'=>'Company: '.$company,
								'udf3'=>'',
								'udf4'=>'',	
								'udf5'=>'',	
								'udf6'=>'',							
								'udf7'=>'',
								'udf8'=>'',
								'udf9'=>'',
								'udf10'=>'',																					
								'ua_ip'=>$ip,
								'ua_device'=>$leaduseragent,
								'ua_query_url'=>$leadqueryurl,
								'landing_page_title'=>$leadpagetitle,
								'utm_source'=>$leadutmsource,
								'utm_medium'=>$leadutmmedium,
								'utm_campaign'=>$leadutmcampaign,
								'utm_content'=>$leadutmcontent,
								'utm_term'=>$leadutmterm,
								'ua_city'=>'',
								'ua_country'=>'',
								'form_data'=>$json,
							);	
		$fields = $input_params;
		$postvars = '';
			foreach($fields as $key=>$value) {
				$postvars .= $key . "=" . $value . "&";
			}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://leadstore.in/capture_leads/capture/19");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postvars);
		// in real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//http_build_query(array('postvar1' => 'value1')));
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);  
  /****************End CURL CALL**********************/


 //$wpdb->print_error();
$headers = "From: Uttam Blastech <salessupport@uttamblastech.com> \r\n";
$headers .= "Reply-To: salessupport@uttamblastech.com \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if($download_pdf=="nopdf")
{
	$subject = 'Uttam Blastech';	
	$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2018 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	
}
else
{
	
	$subject ="Uttam Blastech | " .ucwords($leadpagetitle);
	if($leadpagetitle=="Blasting and Controlled Blasting" || $leadpagetitle=="Seismograph" || $leadpagetitle=="Vibration Measurement & Consultancy Services.")
	{
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br><br><p style="text-align:center"><a href="'.$download_pdf.'" style="text-decoration:none;text-align:center;padding: 15px;color: #fff;background: #00A256;">Download PDF</a></p></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2018 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	}
	else
	{
		$subject = 'Download Controlled Blasting Brochure';
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br><br><p style="text-align:center"><a href="http://uttamblastech.com/l/controlled-blasting/controlled-blasting.pdf" style="text-decoration:none;text-align:center;padding: 15px;color: #fff;background: #00A256;">Download PDF</a></p></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2018 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	}
}

	$sendemail = wp_mail($email, $subject, $message, $headers);
	

	$subject1 =ucwords($leadpagetitle)." | New Enquiry ";
	$to = 'salessupport@uttamblastech.com';
	$headers1 = "From: Uttam Blastech <salessupport@uttamblastech.com> \r\n";
	$headers1 .= "Reply-To: salessupport@uttamblastech.com \r\n";
	$headers1 .= "MIME-Version: 1.0\r\n";
	$headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$headers1 .= "Cc :amarnath<amarnath@deepredink.com>\r\n" ; 
	//$headers1 .= "Cc : Venkat<venkat@deepredink.com>\r\n" ; 
	//$headers1 .= "Bcc :  Rudra<rudra@deepredink.com>\r\n";
	$message1 = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><meta charset="UTF-8"><title>Excel To HTML using codebeautify.org</title></head><body><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><htmlxmlns="http://www.w3.org/1999/xhtml"xmlns="http://www.w3.org/1999/xhtml" style=" line-height: 1.6; margin: 0; padding: 0;"><head><meta content="text/html;charset=utf-8" http-equiv="Content-Type"/><style type="text/css">#wrapper{width: 550px; margin: 0 auto; background:#fff;}}</style><center><div id="wrapper" style="border-bottom:10px solid #333333;width:550px;margin:0 auto;border-collapse:collapse;"><table bgcolor="#fffff" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;font-family:Arial,sans-serif;display: inline-table;" width="550"><tbody><tr style="height:100px;"><td align="left" colspan="2"><img src="https://i.imgur.com/OIuX4rm.png" alt="Uttam Blastech"/></td></tr><tr bgcolor="#fafafa"><td colspan="2" valign="top"><span style="font-size:14px;">Hello, </span></span><br/><br/><span style="font-size:14px;line-height:130%;">We have a new lead from our langing page '.ucwords($leadpagetitle).'. Following are the details: <br/><br/><span style="font-family:Arial,sans-serif;color:#000;font-size:16px;line-height:130%;"><span style="font-size:14px"><strong>Name: </strong>'.ucfirst($name).'<br><strong>Email: </strong>'.$email.'<br><strong>Phone: </strong>'.$phone.'<br><strong>Occupation: </strong>'.$occupation.'<br><strong>Company: </strong>'.$company.'<br></span></span><br/><br/><span style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);">Regards, </span><br style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);"/><span style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);">Uttam Blastech</span><br/></td></tr></tbody></table></div></center></body></html></body></html>';

	$sendemail1 = wp_mail($to, $subject1, $message1, $headers1);

}
else { 
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit; 
}

if($sendemail) {
	//show thankyoupage
  header('Location: ' . $_POST['thankyouurl']);
}
else {
	//show error page
  echo "Something went wrong. Please try again later.";
  //header('Location: ' . get_home_url() .'/ambassadors-connect/?status=error');
}
error_reporting(-1);
ini_set('display_errors', 'On');
?>