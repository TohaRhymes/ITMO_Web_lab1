<!DOCTYPE html>
<html>
<head>
    <title>response page</title>
    <meta charset="utf-8">
    <style>
        #script {
            font-family: "Arial", sans-serif;
            font-style: normal;
            text-align: center;
        }

        .img {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$start = microtime(true);
date_default_timezone_set("UTC");
$time = time() + 3 * 3600;
echo "<p id='script'>Текущее время: " . date("H:i:s",
        $time) . "</p>";

if (empty($_GET['X']) || empty($_GET['Y']) || empty($_GET['R']))
    die ("Вы не выбрали все переменные");
$x = $_GET['X'];
$y = $_GET['Y'];
$r = $_GET['R'];
if(!preg_match('/(?<![\.\d])\d+(?![\.\d])/', $x)||!is_numeric($y)||!preg_match('/(?<![\.\d])\d+(?![\.\d])/', $r)||$x<-4||$x>4||$y<-5||$y>3||$r<1||$r>5)
    die ("X и R должны быть целыми числами, x от -4 до 4, r от 1 до 5. Y числом  от -5 до 3.");

if ($y >= 0 && $x >= 0 && $y + 2 * $x <= $r || $y >= 0 && $x < 0 && $y ** 2 + $x ** 2 <= $r ** 2 || $y < 0 && $x < 0 && $y >= -$r / 2 && $x >= -$r) {
    echo '<p id = "script"> Точка (' . $x . '; ' . $y . ') при параметре R = ' . $r . ' попала в закрашенную область!
                    <figure class="img">
                        <img height="130px"
                             src="img\yes.png"
                             width="130px"
                        >
                    </figure>
                </p>';
} else {

    echo '<p id = "script"> Точка (' . $x . '; ' . $y . ') при параметре R = ' . $r . ' не попала в закрашенную область!
                    <figure class="img">
                        <img height="130px"
                             src="img\no.png"
                             width="130px"
                        >
                    </figure>
                </p>';
}
$t = (float)round((microtime(true) - $start), 4);
if ($t == 0) $t = "менее 0.0001";
echo "<p id='script'> Время работы скрипта: " . $t . " сек</p>";

?>