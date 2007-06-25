<?
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

include("config.php");

$file = file_get_contents($users_file);
$lines = explode("\n",$file);
$num = count($lines);

for( $i = 0; $i < $num; $i++ ) {
  $data = explode(",",$lines[$i]); 
  if( count($data) > 1 ) { echo "<li>" . $data[1] . "</li>"; }
}

?>
