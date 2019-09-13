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

        #scriptError {
            font-family: "Arial", sans-serif;
            font-style: normal;
            font-size: 150%;
            color: red;
            text-align: center;

        }

        .img {
            text-align: center;
        }
    </style>
    <script>
        function clock() {
            let d = new Date();
            let hours = d.getHours();
            let minutes = d.getMinutes();
            let seconds = d.getSeconds();

            if (hours <= 9) hours = "0" + hours;
            if (minutes <= 9) minutes = "0" + minutes;
            if (seconds <= 9) seconds = "0" + seconds;

            let date_time = hours + ":" + minutes + ":" + seconds;
            if (document.layers) {
                document.layers.doc_time.document.write(date_time);
                document.layers.doc_time.document.close();
            } else document.getElementById("doc_time").innerHTML = date_time;
            setTimeout("clock()", 1000);
        }
    </script>
</head>
<body>

<?php
$start = microtime(true);
date_default_timezone_set("UTC");
$time = time() + 3 * 3600;
echo "<p id='script'>Текущее время: <span id='doc_time'><script>clock();</script></span></p>";

if (!isset($_GET['X']) || !isset($_GET['Y']) || !isset($_GET['R']))
    die ('<p id = \'scriptError\'>Вы не выбрали все переменные o_0</p>');

$x = $_GET['X'];
$y = $_GET['Y'];
$r = $_GET['R'];

if (!preg_match('/(?<![\.\d])\d+(?![\.\d])/', $x) || !is_numeric($y) || !preg_match('/(?<![\.\d])\d+(?![\.\d])/', $r) || $x < -4 || $x > 4 || $y < -5 || $y > 3 || $r < 1 || $r > 5)
    die ("<p id = 'scriptError'>ATTENTION! o_0</p> <p id = 'scriptError'>X и R должны быть целыми числами, x от -4 до 4, r от 1 до 5. Y числом  от -5 до 3.</p>");

if ($y >= 0 && $x >= 0 && $y + 2 * $x <= $r || $y >= 0 && $x < 0 && $y ** 2 + $x ** 2 <= $r ** 2 || $y < 0 && $x < 0 && $y >= -$r / 2 && $x >= -$r) {
//    echo '<table id = "script">
//        <tr>
//            <th>X</th>
//            <th>Y</th>
//            <th>R</th>
//            <th>Попадает/нет</th>
//        </tr>
//        <tr>
//            <th>' . $x . '</th>
//            <th>' . $y . '</th>
//            <th>' . $r . '</th>
//            <th>НЕТ</th>
//        </tr>
//    </table>';
    echo '<p id = "script"> Точка (' . $x . '; ' . $y . ') при параметре R = ' . $r . ' попала в закрашенную область!
                   <figure class="img">
                        <img height="130px"
                             src="img\yes.png"
                             width="130px"
                        >
                    </figure> 
                </p>';
} else {
//    echo '<table id = "script">
//        <tr>
//            <th>X</th>
//            <th>Y</th>
//            <th>R</th>
//            <th>Попадает/нет</th>
//        </tr>
//        <tr>
//            <th>' . $x . '</th>
//            <th>' . $y . '</th>
//            <th>' . $r . '</th>
//            <th>НЕТ</th>
//        </tr>
//    </table>';
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