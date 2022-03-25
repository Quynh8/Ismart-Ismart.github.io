<?php
function timestamp(){
    $format = "%H:%M:%S %d-%B-%Y";
    $timestamp = time();
    echo $strTime = strftime($format, $timestamp );
    echo  "<br />";
    echo "Timestamp:" . $timestamp;
}
