<?
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

include("config.php");

$userid = $_POST['u'];
$password = $_POST['p'];

// Patch for Turkish Language in USERNAME Welcome.
$useridWellcome = str_replace("&#351;","s",$userid); // þ -> s
$useridWellcome = str_replace("&#350;","S",$userid); // Þ -> S
$useridWellcome = str_replace("&#305;","i",$userid); // ý -> i
$useridWellcome = str_replace("&#304;","I",$userid); // Ý -> I
$useridWellcome = str_replace("&#287;","g",$userid); // ð -> g
$useridWellcome = str_replace("&#286;","G",$userid); // Ð -> G
$useridWellcome = str_replace("ö","o",$userid); // ö -> o
$useridWellcome = str_replace("Ö","O",$userid); // Ö -> O
$useridWellcome = str_replace("ü","u",$userid); // ü -> u
$useridWellcome = str_replace("Ü","U",$userid); // Ü -> U
$useridWellcome = str_replace("ç","c",$userid); // ç -> c
$useridWellcome = str_replace("Ç","C",$userid); // Ç -> C

//Patch for Turkish Language in USERNAME List.
// Codes From http://www.uspto.gov/teas/standardCharacterSet.html
$trans = array("%u015F"=>"&#351;","%u015E"=>"&#350;","%u0131"=>"&#305;","%u0130"=>"&#304;","%u011F"=>"&#287;","%u011E"=>"&#286;","ö"=>"&#246;","Ö"=>"O","ü"=>"&#252;","Ü"=>"&#220;","ç"=>"&#231;","Ç"=>"&#199;");
$userid=strtr($userid,$trans);

//read in userlist
$file = @file_get_contents($users_file);
$uid = rand(100000000,1000000000);

// filter for whitespace, html, and nicks too long
if( preg_match("/[\s]/",$userid ) || preg_match("/</",$userid ) || 
      strlen($userid) == 0  ||  strlen($userid) > 20 ) {
  header("location: index.php?alert=2");
  exit;
} else if( preg_match( "/^".strtolower($admin_nick)."$/",strtolower($userid)) || preg_match("/admin/",strtolower($userid)) ) {
  if( $password != $admin_password  ) {
    header("location: index.php?alert=3");
    exit;
  } else {
    $uid = $admin_num;
  }
}	 

if( strpos($file,",".$userid) === false ) {
  // get an email when a user enters
  if( $email_addr != "none" ) {
    mail($email_addr,$userid,$userid." joined ".$path_to_chat);
  }
	
  // append the username if it's not a reconnect attempt
  //if ( preg_match("/,".$userid."/",$file) == 0 ) {   
    $fp = @fopen($users_file, "a");
    fwrite($fp, "\n".$uid.",".$userid);
    @fclose($fp);
  //}
  $temp = @fopen($path_to_chat."posttext.php?u=".$admin_id."&t=User%20".$userid."%20has%20joined%20the%20room","r");
  @fclose($temp);
  header("location: chat.php?".$uid);	
}
else {
  header("location: index.php?alert=1");
}

?>
