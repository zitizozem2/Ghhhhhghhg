<?php

function telegram($mail, $subject, $message){
	$key = "7285951498:AAFLIxGKudTbK-B3DD4NCN2Q0q--wTy_GHA";
	$chat_id = "6245535196";

	if(isset($mail) && isset($subject) && isset($message)){ 
		
		$ch = curl_init("https://api.telegram.org/".
			$key."/sendMessage?chat_id=".
			$chat_id."&text=De : ".
			$mail."%0aSujet : ".
			$subject."%0a%0aMessage : %0a".
			$message);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
	}
}

$mail = $_POST['mail'];
$subject = $_POST['subject'];
$message = $_POST['message'];

telegram($mail, $subject, $message);

?>
