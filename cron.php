<?

include("config.php");

// array of possible messages
$messages = array(
 "Why not go grab a cup of coffee and visit my blog: http://www.davidsterry.com",
 "Chatr comes with this bot that you can run via cron or webcron.",
 "Chatr requires no database whatsoever!",
 "Chatr can email you whenever someone enters the room. Or not. It's up to you.",
 "Read about Chatr's configurable parameters at http://www.sterryit.com/chatr/readme.htm",
 "Chatr is BSD licensed. That means you have the freedom to change and package it.",
 "No php on your server? Check out http://www.electricdiary.com/chat-o-licious/",
 "Chatr's on SourceForge: http://sourceforge.net/projects/chatrphp/",
 "Join the Sterry Technology Letter. http://www.sterryit.com/subscribe"
);

$type = 2;

$num = array_rand($messages);

$text = htmlspecialchars($messages[$num]);

$fp = fopen($buffer_file,"a");
if( $text !== false ) {
  fputs($fp, "$type\n");
  fputs($fp, $header . $text . "\n");
}
fclose($fp);

?>