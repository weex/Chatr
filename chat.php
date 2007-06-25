<html>
<head>

<title>Chatr - AJAX/PHP Chat</title>
<link rel="stylesheet" href="style.css" type="text/css" title="ice">
<link rel="alternate stylesheet" href="green.css" type="text/css" title="vert">

<script type="text/javascript" src="md4.js"></script>	
<script type="text/javascript" src="styleswitcher.js"></script>	
<script type="text/javascript" src="chatclient.js"></script>
<script language="JavaScript">
<!--
function setsmiley(what){
	tmp=document.getElementById("mytext");
    tmp.value = tmp.value+" "+what+" ";
    tmp.focus();
}
//-->
</script>
		
<style type="text/css">
<!--
.style1 {color: #000000}
.style2 {font-family: Arial, Helvetica, sans-serif}
-->
</style></head>
<body>

    <div class="bgtext">Skin me: 
    <a href="#" onclick="setActiveStyleSheet('vert'); return false;">green</a>
    <a href="#" onclick="setActiveStyleSheet('ice'); return false;">ice</a></div>
    <p><br>
</p>
    <div class="form">
					
		<div id="chatpane">
		  <ul id="chatbuffer"></ul>
		</div>

		<div id="userpane">
			<ul id="userlist"></ul>
		</div>
				
		<p class="clear">
		
		<div id="actions"> chat: 
		<a href="javascript:setsmiley(':)')"><img src="images/smile.gif" border="0" alt=":)" align="bottom"></a>
		<a href="javascript:setsmiley(':D')"><img src="images/laugh.gif" border="0" alt=":D" align="bottom"></a>
		<a href="javascript:setsmiley(':p')"><img src="images/tongue.gif" border="0" alt=":p" align="bottom"></a>
		<a href="javascript:setsmiley(';)')"><img src="images/wink.gif" border="0" alt=";)" align="bottom"></a>
		<a href="javascript:setsmiley(':kiss')"><img src="images/kiss.gif" border="0" alt=":kiss" align="bottom"></a>
		<a href="javascript:setsmiley(':(')"><img src="images/sad.gif" border="0" alt=":(" align="bottom"></a>
		
		</div>		
				
				
		<input class="mytext" id="mytext" name="mytext" type="text" onFocus="textFocus=true" onBlur="textFocus=false">	
				
		</p><p id="charcount">0 characters</p> <?
  include("config.php");
  if( $_SERVER['QUERY_STRING'] == $admin_num ) {
	echo "<a href='".$buffer_file."' target='_blank'>buffer</a> <a href='".$pings_file."' target='_blank'>pings</a> <a href='".$users_file."' target='_blank'>users</a>";
  }
?>
		<p id="stats"><strong>Quick Stats</strong> Pings: 0 Requests: 0 Posts: 0 </p>
				
	<div id="archivelink"><strong><a href="buffertext.php?u=<? echo $_SERVER['QUERY_STRING']; ?>&d=1" target="_blank">View Archive</a></strong></div>
	
	</div>
	
			
    <p>
      <script type="text/javascript">startChat();</script>
<span class="style1">Download the <a href="http://www.davidsterry.com/chatr.latest.zip" target="_blank">source</a> or check out the <a href="http://www.sterryit.com/chatr/readme.htm" target="_blank">readme</a></span></p>
    <p align="center"></p>
    <p>&nbsp;</p>
	
</body>
</html>
