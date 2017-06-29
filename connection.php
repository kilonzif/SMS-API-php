<?php


//db
  $con = mysqli_connect("localhost","root","","Api");

// Check connection
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


   // $query = "SELECT * FROM accounts WHERE userName = '$user' AND passWord = '$pass'";// AND password = $userPass";

   // $result = mysqli_query( $con, $query);

   //    $row = mysqli_fetch_array($result);

   //      if(!$row){
   //        echo "Incorrect Username or Password.";
   //      }else{
   //        echo "Login Successful...";
   //        header("location: ticket.php");
   //        exit(); 
   //      }

  $phone=$_POST['PHONENUMBER'];

  $msg=$_POST['Message'];

  if ($_POST['PHONENUMBER']!="" && $_POST['Message']!="") {

      $toSend=array(
       "SenderName"=>'KASNEB',//$row['SenderName']
       "Mobile"=>$phone,
       "Message"=>$msg,
   );
       $url="http://192.168.11.225/SMSService/API/SMS";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   //curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($toSend));
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'DeveloperKey: 084049D0-AB72-4EE2-9EDE-0C25C1D1268C',
       'Password: '.hash('sha256', 'Pass@1234')
   ));
   $result = curl_exec($ch);
   //return $result;
   echo $result;
 //  INSERT INTO "senttexts" (`txtId`, `Mobile`, `Message`) VALUES (, $phone, $Message);

      // $sql = "INSERT INTO sentTexts (Mobile, Message)
    //VALUES ($phone, '$msg')";

    $sql="UPDATE sentTexts set Message='kiki' where txtId=3";
   


    if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}




echo "successful yeah";

  } else {
    echo "fill the fieldsS";
  }
  

   
?>