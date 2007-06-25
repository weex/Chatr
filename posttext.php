<?
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

include("config.php");

$user = $_GET['u'];
$text = $_GET['t'];

echo $text;

$type = 0; // default to user regular message => css class: usermsg
$post = 0; // only post if it's a valid user
$header = " ";

if( $user == $admin_id ) {
  // system message => css class: systemmsg
  $type = 1;  
  $post = 1;
}
else
{
  $file = file_get_contents($users_file);
  $lines = explode("\n",$file);
  $num = count($lines);

  if( !(strpos($text, '/me') === false) && ( strpos($text, '/me') == 0 || strpos($text, '/me') == 1) ) {
    $type = 2;  // user action message => css class: actionmsg
  }	

  // use uid to grab username from users file
  for( $i = 0; $i < $num; $i++ ) {
    $data = explode(",",$lines[$i]); 
    $uid = $data[0];
	if( $user == $uid && count($data) > 1 ) { 
	  $post = 1;
	  if( $type == 0 ) { 
	    $header = $data[1] . ": "; 
	  }
	  else if ($type == 2) {
	    $header = $data[1] . " "; 
	    $text = substr($text,4);
	  }  
	} 
  }
}

/*$text = preg_replace('/<.*?>/','',$text);*/
$text = htmlspecialchars($text);

// Patch for Turkish Language in MESSAGE.
// Codes from http://www.uspto.gov/teas/standardCharacterSet.html
$trans = array("%u015F"=>"&#351;","%u015E"=>"&#350;","%u0131"=>"&#305;","%u0130"=>"&#304;","%u011F"=>"&#287;","%u011E"=>"&#286;","ö"=>"&#246;","Ö"=>"O","ü"=>"&#252;","Ü"=>"&#220;","ç"=>"&#231;","Ç"=>"&#199;");
$text=strtr($text,$trans);

//Smileys
$text=str_replace(":)","<img src='images/smile.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":(","<img src='images/sad.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(";)","<img src='images/wink.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":p","<img src='images/tongue.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":P","<img src='images/tongue.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":D","<img src='images/laugh.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":d","<img src='images/laugh.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":roll","<img src='images/rollface.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":cheers","<img src='images/cheers.gif' border=0 align='absmiddle'>",$text);
$text=str_replace(":kiss","<img src='images/kiss.gif' border=0 align='absmiddle'>",$text);



$fp = fopen($buffer_file,"a");
if( $header && $text !== false && $post == 1) {
  fputs($fp, "$type\n");
  fputs($fp, $header . $text . "\n");
}
fclose($fp);

?>
