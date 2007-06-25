<?
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

// this is intended to be included(via php or shtml include) on your page to show 
// how many are in the room with the added benefit of removing the last timed out user

include("config.php");

include("timeout.php");

$lines = file ($users_file);
$num_lines = count ($lines);

echo "<a class='chatcount' href='".$path_to_chat."'>Chatr (".$num_lines.")</a>";

?>
