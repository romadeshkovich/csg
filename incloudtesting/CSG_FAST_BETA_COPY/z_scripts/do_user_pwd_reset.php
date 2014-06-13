<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include 'db_connect.php';

if ($_GET['type']=='Reset')
{

foreach($_POST as $key => $value) {
	$data[$key] = filter($value); // post variables are filtered
}

$email_input = $data['email_reset'];


$result = $mysqli->query("SELECT * FROM users WHERE email='$email_input' AND `banned` = '0';") or die($mysqli->error); 
$num = $result->num_rows;

  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	while ($row = $result->fetch_assoc()) {
        $id = $row['users_id'];
		$pwd = $row['pwd'];
		$username = $row['username'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$full_name = $row['full_name'];
		$approved = $row['approved'];
		$user_level = $row['user_level'];
		$autopwd = $row['autopwd'];
		$banned = $row['banned'];
    }

    
	$newpass1 = GenPwd();
	$md5_id = md5($newpass1);
	
	if($newpass1 != NULL){ 
	    $newpass = PwdHash($newpass1);
		$mysqli->query("UPDATE users SET pwd='$newpass', autopwd='1', md5_id='$md5_id' WHERE email='$email_input'") or die($mysqli->error); 
		
		}

	$to      = $email_input;
	$subject = 'CSG FAST - Website Password Reset';
	$message = "Hello $firstname, \n\n We are emailing you to notify you of your new password change to $newpass1";
	$headers = 'From: FAST_SUPPORT@csg-email.com' . "\r\n" .
		'Reply-To: FAST_SUPPORT@csg-email.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	echo '01'; //Reset Success!
	
	
	} else { echo '02'; }//Email does not exist!
} 

if ($_GET['type']=='Update')
{

foreach($_POST as $key => $value) {
	$data[$key] = filter($value); // post variables are filtered
}

$email_input = $data['email_confirm'];
$pwd_input = $data['pwd_confirm'];

if(!preg_match( '/(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $pwd_input) || strlen($pwd_input) < 7)
{
    echo '13';
	$mysqli->close(); //Close mysql connection that was started in the include file
	exit;
}

$result = $mysqli->query("SELECT * FROM users WHERE email='$email_input' AND `banned` = '0';") or die($mysqli->error); 
$num = $result->num_rows;

  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	while ($row = $result->fetch_assoc()) {
        $id = $row['users_id'];
		$pwd = $row['pwd'];
		$username = $row['username'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$full_name = $row['full_name'];
		$approved = $row['approved'];
		$user_level = $row['user_level'];
		$autopwd = $row['autopwd'];
		$banned = $row['banned'];
    }

    $md5_id = md5($pwd_input);
	$newpass= PwdHash($pwd_input);
	
	if($pwd_input != NULL){ 
		$mysqli->query("UPDATE users SET pwd='$newpass', autopwd='0', md5_id='$md5_id', last_pwd_timestamp=NOW() WHERE email='$email_input'") or die($mysqli->error); 
		
		/*********** Use curl to post to do_login_user page to create user session with new password ****/
	
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL,"do_login_user.php?type=Login");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
					"username=$email_input&pwd=$pwd_input");

		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		
		/************* End of sent session creation ********/
	}

	$to      = $email_input;
	$subject = 'CSG FAST - Website Password Reset';
	$message = "Hello $firstname, \n\n We are emailing you to notify you of your new password change to $pwd_input";
	$headers = 'From: FAST_SUPPORT@csg-email.com' . "\r\n" .
		'Reply-To: FAST_SUPPORT@csg-email.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	echo '11'; //Password has now been updated!
	
	} else { echo '12'; }//Error: Email does not exist!
} 

$mysqli->close(); //Close mysql connection that was started in the include file
?>