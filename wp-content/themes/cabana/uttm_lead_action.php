<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require_once("class.phpmailer.php");
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
        //$wpdb->print_error();



if($download_pdf=="nopdf")
{

	$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2016 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	
}
else
{
	
	if($leadpagetitle=="Blasting and Controlled Blasting")
	{
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br><br><p style="text-align:center"><a href="'.$download_pdf.'" style="text-decoration:none;text-align:center;padding: 15px;color: #fff;background: #00A256;">Download PDF</a></p></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2016 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	}
	else
	{
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><head><META http-equiv="Content-Type" content="text/html; charset=utf-8"></head><center><body><div width="550px" style="width:550px;margin:0 auto;border:1px solid #d2d2d2"><div style="font-family:Arial,sans-serif;font-size:12px;line-height:160%;color:#6b6b6b;"><table cellpadding="12" cellspacing="0" width="550" border="0" style="background:#ffffff;border-bottom:1px solid #d2d2d2;font-size:12px;font-family:Arial,sans-serif"><tr><td><img src="https://i.imgur.com/85fkTKg.png" alt=""></td></tr></table><table width="550" border="0" style="border-collapse:collapse;"><tr><td><img src="http://i.imgur.com/kvAMUdi.png" alt=""></td></tr></table><table cellpadding="15" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td style="padding:25px 35px 25px 15px"><span style="color:#817452;font-family:Arial,sans-serif;font-size:15px;"><b>Hello there!</b></span><br/><br/><span style="color:#686868;font-family:Arial,sans-serif;font-size:14px;line-height:130%">Thank you for reaching out to us. Our team will contact you soon.</span><br/><br><br><p style="text-align:center"><a href="http://uttamblastech.com/l/controlled-blasting/controlled-blasting.pdf" style="text-decoration:none;text-align:center;padding: 15px;color: #fff;background: #00A256;">Download PDF</a></p></td></tr></table><table cellpadding="18" cellspacing="0" width="550" border="0" style="background:#ffffff;font-size:12px;font-family:Arial,sans-serif"><tr><td><p style="color:#6b6b6b;font-size:15px;">Regards,<br/>Uttam Blastech</p></td></tr><tr><td cellpadding="15" bgcolor="#505050"><p style="color:#fff;font-size:11px;font-family:Arial,sans-serif;text-align:center;">&copy; 2016 Uttam Blastech Pvt. Ltd.</p></td></tr></table></div></div></body></center></html>';
	}
}


 
  /**** Send Emails ****/
  
	$from ='contact@uttamblastech.com';
	$from_name ='Uttam Blastech';
	 $sendfre=send_fre($name,$email,$phone,$leadpagetitle,$from,$from_name,$message);
	$sendnotification=send_lead_notification($name,$email,$phone,$leadpagetitle,$from,$from_name);
	
function send_fre($name,$email,$phone,$leadpagetitle,$from,$from_name,$message)
{	 
	$subject = "Uttam Blastech ". ucwords($leadpagetitle);
	$to = $email;
	$to_name = $name;
	send_SMTP($from, $from_name, $to, $to_name, $subject, $message, "", "", "");

}
  
function send_lead_notification($name,$email,$phone,$leadpagetitle,$from,$from_name)
{

	$subject1 = "Uttam Blastech " .ucwords($leadpagetitle)." | New Enquiry #".date('d-m-Y');
	$to = 'venkat@deepredink.com';
	$to_name = 'Venkat';
	$cc_emails = array('venkat@deepredink.com'=>'Venkat');
	$bcc_emails ="";
	$message1 = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Excel To HTML using codebeautify.org</title></head><body><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><htmlxmlns="http://www.w3.org/1999/xhtml"xmlns="http://www.w3.org/1999/xhtml" style=" line-height: 1.6; margin: 0; padding: 0;"><head><meta content="text/html;charset=utf-8" http-equiv="Content-Type"/><style type="text/css">#wrapper{width: 550px; margin: 0 auto; background:#fff;}}</style><center><div id="wrapper" style="border-bottom:10px solid #02AEF0;width:550px;margin:0 auto;border-collapse:collapse;"><table bgcolor="#fffff" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;font-family:Arial,sans-serif;display: inline-table;" width="550"><tbody><tr style="height:100px;"><td align="left" colspan="2"><img src="https://i.imgur.com/OIuX4rm.png" alt="OMNI Hospitals"/></td></tr><tr bgcolor="#fafafa"><td colspan="2" valign="top"><span style="font-size:14px;">Hello, </span></span><br/><br/><span style="font-size:14px;line-height:130%;">We have a new lead from our langing page '.ucwords($leadpagetitle).'. Following are the details: <br/><br/><span style="font-family:Arial,sans-serif;color:#000;font-size:16px;line-height:130%;"><span style="font-size:14px"><strong>Name: </strong>'.ucfirst($name).'<br><strong>Email: </strong>'.$email.'<br><strong>Phone: </strong>'.$phone.'<br></span></span><br/><br/><span style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);">Regards, </span><br style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);"/><span style="font-family: Arial, sans-serif; font-size: 14px; line-height: 20.8px; background-color: rgb(250, 250, 250);">Uttam Blastech</span><br/></td></tr></tbody></table></div></center></body></html></body></html>';
	send_SMTP($from, $from_name, $to, $to_name, $subject1, $message1, "", $cc_emails, $bcc_emails);
  
}
    /**** End Emails *****/
   header('Location: ' . $_POST['thankyouurl']);
}
else { 
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
}

function send_SMTP($from, $from_name, $to, $to_name, $subject, $message, $plain_text_message, $cc_emails=null, $bcc_emails=null) {
	
	
	$mail = new PHPMailer();
	
	# config
	$mail->IsSMTP();
	$mail->IsHTML(true);
	
	$mail->SMTPDebug  		= 3;
	$mail->Debugoutput 		= 'html';
	$mail->Host          	= "smtp.elasticemail.com";
	$mail->SMTPKeepAlive 	= true;
	$mail->Port       		= 587;
	$mail->SMTPSecure 		= 'tls';                    
	$mail->SMTPAuth 		= true;
	$mail->Username 		= "harish@deepredink.com";
	$mail->Password 		= "46ae6f2f-0cba-4b4f-9d3c-0ccc29677fb5";
	$mail->WordWrap 		= 50;
	
	
	$mail->From 		= $from;
	$mail->FromName 	= $from_name;
	$mail->Subject 		= $subject;
	$mail->Body 		= $message;
	$mail->AltBody 		= $plain_text_message;
	
	# add recepients
	$mail->AddAddress($to, $to_name);
	
	$cc_array = array();
	if($cc_emails != null) {
		foreach($cc_emails as $cc_email => $from_name) {
			$mail->AddCC($cc_email, $from_name);
			array_push($cc_array, $cc_email);
		}
	}
	
	$bcc_array = array();
	if($bcc_emails != null) {
		foreach($bcc_emails as $bcc_email => $from_name) {
			$mail->AddCC($bcc_email, $from_name);
			array_push($bcc_array, $bcc_email);
		}
	}
	
	if( ! $mail->Send()) {
		
		$cc_string = '';
		if(count($cc_array > 0)) {
			$cc_string = 'Cc: ';
			$cc_string .= implode(',', $cc_array);
		}

		$bcc_string = '';
		if(count($bcc_array > 0)) {
			$bcc_string = 'Bcc: ';
			$bcc_string .= implode(',', $bcc_array);
		}

		$headers = array("MIME-Version: 1.0",	"Content-type: text/html", "From: {$from}", "Reply-To: {$from}");
		if($cc_string != '') {
			array_push($headers, $cc_string);
		}
		if($bcc_string != '') {
			array_push($headers, $bcc_string);
		}

		array_push($headers, "X-mailer: PHP/" . PHP_VERSION);

		$headers = implode("\r\n", $headers);

		mail($to , $subject , $message, $headers);
		return TRUE;
	
	} else {
		return TRUE;
	}
}

?>