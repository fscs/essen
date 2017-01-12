<?php
require_once("./url.php");
session_start();
$sid = session_id();
$day = date("Ymd");

$db = new SQLite3('access.db');
$db->exec('INSERT OR REPLACE INTO log (day, session) VALUES ('.$day.', "'.$sid.'")');

$result = $db->query('select count(*) anz from log where day='.$day);
$counter = $result->fetchArray();
$count = $counter["anz"];

$mensen = array('m1'=>'3.500','m2'=>'3.580','m3'=>'9.100');
if(isset($_GET['m']) && array_key_exists('m'.$_GET['m'], $mensen)){
    $mensa = $mensen['m'.$_GET['m']];
    $m = 'm'.$_GET['m'];
}
else{
    $mensa = $mensen['m1'];
    $m = "m1";
}

include "header.php";

$cacheFolder = './cache/';
$cacheName = $mensa.'.html';

if(file_exists($cacheFolder.$cacheName) && filemtime($cacheFolder.$cacheName) > time()-60*3){
    echo file_get_contents($cacheFolder.$cacheName);
}
else{
    $content = file_get_contents($essensurl . $mensa);
    $doc = new DOMDocument();
    @$doc->loadHTML($content);
    $table = $doc->getElementsByTagName('table');
    $content = $table->item(0);
    $content = $content->ownerDocument->saveXML($content);
    file_put_contents($cacheFolder.$cacheName, $content);
    echo $content;
}

include "footer.php";
?>
