<?
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

include("config.php");

$userid = $_GET['u'];
$d = $_GET['d'];

#$userid = 3077432343;
$type = 0;

$users = @file_get_contents($users_file);
if( strstr($users, $userid) == 0 ) {

  echo $userid."timeout<br><br><br><br><br><br><br><br><br><center><li class='servermsg'>You have timed out, please <a href='".$path_to_chat."' target='_top'>login</a> again</li></center>";
# i want to stop the incessant requests on the client side...if I send you back your own id, your client stops updating.
  exit();
}

$file = file_get_contents($buffer_file);
$lines = explode("\n",$file);
$num = count($lines);
$num--; #cuz there's always a whitespace line at the end.
if( $num < $maxlines * 2 || $d == 1 ) { $start = 0; }
else { $start = $num - ($maxlines  * 2) ; }
if ( $d == 1 ) { echo "<html><head><title>Chatr Archive</title><link rel='stylesheet' href='style.css' type='text/css' ></head><body style='width:620px'><div id='chatpane'><ul id='chatbuffer'>"; }
echo "<div width='50%'>";
for($i = $start; $i < $num; $i = $i + 2) {
  $lines[$i+1] = stripslashes($lines[$i+1]);
  $lines[$i+1] = preg_replace('/(http:\/\/\S*)/','<a href="$1" target="_blank">$1</a>',$lines[$i+1]);
  
  $type = rtrim($lines[$i]);
  if( $type == '0') { 
    echo "<li class='usermsg'>" . $lines[$i+1] . "</li>";
  }
  else if ( $type == '1' ) { 
    echo "<li class='servermsg'>" . $lines[$i+1] . "</li>";
  }
  else if ( $type == '2' ) { 
    echo "<li class='actionmsg'>" . $lines[$i+1] . "</li>";
  } 
}
echo "</div>";
if ( $d == 1 ) { echo "</div></ul></body></html>"; }
?>
