<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<title>API With Forms</title>
	<link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<body>

  <div class="login">
    <h1>Send Text</h1>
    <form action="connection.php" method="post">
    <div id="error_info" style="text-align: center;"></div>
	<label for="PHONENUMBER">Mobile</label>
      <p><input type="Number" name="PHONENUMBER" min="0"><br><br></p>
      <label for="Message">Message</label>
     <p> <textarea rows="4" cols="40" name="Message" >Enter text here...</textarea></p>      
      <p class="submit"><input  type="submit" name="submit" value="submit"></p> 
    </form>
  </div>





</body>
</html>