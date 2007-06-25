<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Chatr Login - AJAX/PHP Chat</title>
</head>

<body>
<p>Enter a name and click Login to chat. Visit <a href="http://www.sterryit.com/chatr/">Chatr</a> for updates or to get your own.</p>
<p>  
<?
 
// errors 
if ( $_GET['alert'] == 1 ) {
  echo "That username already exists.<br>";
} else if ( $_GET['alert'] == 2 ) {
  echo "The username may not contain spaces or html, and must be between 1 and 20 characters in length.<br>"; 
} else if ( $_GET['alert'] == 3 ) {
  echo "If you're the administator, please enter the correct password. Otherwise, enter another name.<br>";
}

?> 
</p>
<form name="form1" method="post" action="login.php">
  <table width="397" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="229">username:</td>
      <td width="168"><input type="text" name="u"></td>
    </tr>
    <tr>
      <td>password (admin only): </td>
      <td><input name="p" type="password" id="p"></td>
    </tr>
  </table>
  <p>
	<input type="submit" name="Submit" value="Login">
  </p>
</form>

</body>
</html>
