<?php
$BEGIN_MS = microtime(true);
$CORRECT = true;
date_default_timezone_set("UTC") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 1</title>
    <style>
        body {
            background-image: url("https://media.giphy.com/media/rWY9ySfjytitq/giphy.gif");
        }

        .header {
            overflow: hidden; /*Видимость вылезших элементов*/
            background: #007765;
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            width: 100%;
            height: 120px;
            /*text-align: right;*/
        }

        #logo {
            float: left;
        }

        #info {
            /*text-align: center;*/
            color: white;
            font-family: sans-serif;
            font-size: 16px;
            margin: 0px 10px 0px;
            float: right;
        }

        .main {
            margin: 120px auto 0px;
            padding: 1px 5px 1px;
            display: block;
            background: rgb(45, 184, 108);
            color: #ffffff;
            width: 650px;
            height: 100%;
            font-family: "Arial", sans-serif;
            font-style: normal;
        }

        .inputField {
            text-align: left;
            margin: 30px 10px;
        }

        .button {
            color: black;
            border-color: #94f559;
            border-style: ridge;
            border-radius: 10px;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#6ed54b), to(#d3ffc9));
        }

        .button:hover {
            color: black;
            border-color: #6ccf5a;
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#6ed54b), to(#289c44));
        }

        #button1 {
            margin: 0px 5px 0px 70px;
        }

        /*.button:focus {*/
        /*    color: white;*/
        /*}*/

        iframe {
            border-width: 0px;
            width: 100%;
            height: 270px;
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
<div class="header">
    <div id="logo">
        <figure class="img">
            <img height="85px"
                 src="img/vt_logo.png"
                 width="85px"
            >
        </figure>
    </div>
    <div id="info">
        <p>Чангалиди Антон Ильич</p>
        <p>P3214</p>
        <p>Вариант 214020</p>
    </div>
</div>

<div class="main">
    <table width="100%">
        <h1>Результат проверки</h1>
        <?php

        echo "<p id='script'>Текущее время: <span id='doc_time'><script>clock();</script></span></p>";

        if (!isset($_GET['X']) || !isset($_GET['Y']) || !isset($_GET['R']))
            die ('<p id = \'scriptError\'>Вы не выбрали все переменные o_0</p>');
        echo count($_GET);
        if (count($_GET)!=3)
            die ('<p id = \'scriptError\'>Очень странные данные! o_0</p>');
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
        ?>

        <p>Запрос выполнен. Время работы
            скрипта: <?php printf("%2.3f", (microtime(true) - $BEGIN_MS) * 1000) ?> миллисекунд</p>
        <form action="index.html">
            <input class="button" type="submit" value="BACK">
        </form>
    </table>


</div>



</body>
</html>