<?php

use Jenssegers\Date\Date;
Date::setLocale('th');


function get_countDay($begin,$end){
    $dArr1 = preg_split("/-/", $begin);
    list($year1, $month1, $day1) = $dArr1;
    $Day1 = mktime(0,0,0,$month1,$day1,$year1);

    $dArr2 = preg_split("/-/", $end);
    list($year2, $month2, $day2) = $dArr2;
    $Day2 = mktime(0,0,0,$month2,$day2,$year2);

    return round(abs( $Day2 - $Day1 ) / 86400 )+1;
}

function get_dmY($date){
    $Year = Date::parse($date)->format('Y')+543;
    $Month= Date::parse($date)->format('m');
    $Day= Date::parse($date)->format('d');

    return "$Day-$Month-$Year";
}

function get_Ymd($date){
    $Year = Date::parse($date)->format('Y')+543;
    $Month= Date::parse($date)->format('m');
    $Day= Date::parse($date)->format('d');

    return "$Year-$Month-$Day";
}
function get_dateTime($date){

    $Year = Date::parse($date)->format('Y')+543;
    $Month= Date::parse($date)->format('m');
    $Day = Date::parse($date)->format('d');
    $Hour = Date::parse($date)->format('H');
    $Minute = Date::parse($date)->format('i');
    $Seconds = Date::parse($date)->format('s');

    return "$Day-$Month-$Year $Hour:$Minute:$Seconds";
}

function get_jFY($date){

    $Year = Date::parse($date)->format('Y')+543;
    $Month= Date::parse($date)->format('F');
    $Day= Date::parse($date)->format('j');
    return "$Day $Month $Year";
}
/*
function formatDateThat($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute";
}
*/
