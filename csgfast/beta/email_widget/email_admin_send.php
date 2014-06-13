<?php
/*************************************************
* Author: Amber Bryson
* Date: 2/7/2014
* Send Email script functionality for admin.
* PARENT FILE: z_scripts/email_template_update.php, 
* which is called in admin_email.php
**************************************************/

//grab the user id from the parent file, email_template_update.php
foreach ($send_to_array as $user_id){

	//query the user's information from the 5 main tables.
	$user_qry = "SELECT * FROM users t
						  LEFT JOIN farm_agent_info t1
						  ON t.users_id = t1.users_id
						  LEFT JOIN farm_agent_staff_info t2
						  ON t.users_id = t2.users_id
						  LEFT JOIN farm_incontact_info t3
						  ON t.users_id = t3.users_id
						  LEFT JOIN products_ext t4
						  ON t.users_id = t4.users_id
						  WHERE t.users_id='$user_id'";
	$user_result = $mysqli->query($user_qry);
	$a_row = mysqli_fetch_array($user_result);
	
	//Place information into keyword variables
	$myfull = $user_name; //grabbed from parent file email_template_update.php
	$myemail = 'FAST_support@csg-email.com';
	$first = $a_row['firstname'];
	$last = $a_row['lastname'];
	$full = $a_row['full_name'];
	$un = $a_row['username'];
	$useremail = $a_row['email'];
	$poc = $a_row['poc'];
	$approvedate = $a_row['start_request_date'];
	$mainline = $a_row['mainphone'];
	$agentcode = $a_row['agent_code'];
	$regdate = $a_row['reg_date'];
	$pif = $a_row['pif'];
	$portal = $a_row['portal_update_time'];
	$lastlogin = $a_row['last_login_timestamp'];
	$lastpwd = $a_row['last_pwd_timestamp'];
	
	//Fill the headers (to, from, bcc, cc, html allowed, etc)
	$headers = "From: FAST_Support@csgemail.com \r\n";
	$headers .= "Reply-To: FAST_Support@csgemail.com \r\n";
	if(!empty($bcc)){ //if user opted to bcc an email, include it in the header
		$headers .= "BCC: $bcc \r\n";
	}
	if(!empty($cc)){//if user opted to cc in the email, include it in the header
		$headers .= "CC: $cc \r\n";
	}
	$headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";
	
	//convert the html entities to their applicable characters.
	$reg_message = html_entity_decode($content); //content is from parent file email_template_update.php
	
	//Regular expression searches for the keyword format specified on the admin_email.php page.
	//They are then replaced in the message with the user's information
	preg_match_all( '#\[.+\]#U', $reg_message, $shortcodes );	
	foreach($shortcodes[0] as $replace){
		$trimmed_sc = ereg_replace("[^A-Za-z0-9-]", "", $replace); //Cuts off left and right bracket to use as clean variable name
		$new_bodytext = str_replace("$replace", $$trimmed_sc, $reg_message);
		$reg_message = $new_bodytext;
	}
	
	//Send the message
	if(mail($useremail, $send_title, $reg_message, $headers)){
		echo "email has been sent!";
	}else{
		echo "email failed";
	}	
}
?>
