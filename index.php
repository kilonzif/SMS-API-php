<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<title>API</title>
</head>
<body>

<?php

 $con = mysqli_connect("localhost","root","","api");

// Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 $sql="SELECT SenderName,Mobile,Message FROM messagetable WHERE codeId=2";




$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

   

   //time init

$t=time();

  $toSend=array(
       "SenderName"=>'KASNEB',
       "Mobile"=>$row['Mobile'],
       "Message"=>$row['Message'],
   );

   $url="http://192.168.11.225/SMSService/API/SMS";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($toSend));
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'DeveloperKey: 084049D0-AB72-4EE2-9EDE-0C25C1D1268C',
       'Password: '.hash('sha256', 'Pass@1234')
   ));
   $result = curl_exec($ch);
   //return $result;
   //echo $result;
   echo("Message sent to  ".$row['Mobile']."  on   ". "<br>");
   echo(date("Y-m-d",$t));echo("  at <br>");
     echo(date("H:i:s",$t));
 ?>

</body>
</html>