<? 
// Chatr - Super-simple chat for your site
//   (c) 2006 David Sterry
//   Distributed under the BSD license
//   Link: http://www.sterryit.com/chatr

// if config.php exists then do nothing
$path = getcwd();
if( file_exists($path."/config.php") ) { 
  header("location: install.php?alert=1");
  exit;
}

$number = rand(1000,10000);

// set a new admin number
$admin = $number*100000;
$admin_num = $admin + 1;

// set the path_to_chat
$path_to_chat = $_POST['path'];

// set an admin nick
$admin_nick = $_POST['admin_nick'];

// set an admin password
$admin_password = $_POST['password'];

// generate a short random number to generate to filenames
$b = "b".$number.".txt";
$u = "u".$number.".txt";
$p = "p".$number.".txt";

$e = $_POST['email_address'];

$line = array();

array_unshift( $line, "\$path_to_chat = '" .$path_to_chat . "'; ?>" );
array_unshift( $line, "\$admin_nick = '" . $admin_nick . "';" );
array_unshift( $line, "\$admin_password = '" . $admin_password . "';" );
array_unshift( $line, "\$pings_file = '" . $p . "';" );
array_unshift( $line, "\$users_file = '" . $u . "';" );
array_unshift( $line, "\$buffer_file = '" . $b . "';" );
array_unshift( $line, "\$timeout = '62';" );
array_unshift( $line, "\$maxlines = '20';" );
array_unshift( $line, "\$admin = ".$admin.";" );
array_unshift( $line, "\$admin_num = ".$admin_num.";" );
array_unshift( $line, "<? \$email_addr = '" . $e . "';" );
 

$file = implode("\n",$line);

$fp = @fopen("config.php", "w");
if ($fp) {
  fwrite($fp, $file);
  @fclose($fp);
}

header("location: index.php");

?>
