<?php
$file_path = $_SERVER['DOCUMENT_ROOT'] . "/mate/" . $PRM['type'] . "/index.html";
if(file_exists($file_path)) {
    $fp = fopen($file_path, "r");
    $str = fread($fp, filesize($file_path));
    echo $str = str_replace("\r\n", "<br />", $str);
    fclose($fp);
}else{
    echo("(QwQ)");
}
?>