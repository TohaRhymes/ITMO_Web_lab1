<!DOCTYPE html>
<html>
<head>
    <title>response page</title>
    <meta charset="utf-8">
    <style>
        #script{
            font-family: "Arial", sans-serif;
            font-style: normal;
            text-align: center;
        }
        .img{
            text-align: center;
        }
    </style>
</head>
<body>
<?php

$x = $_GET['X'];
$y = $_GET['Y'];
$r = $_GET['R'];
if ($y>=0&&$x>=0&&$y+2*$x<=$r||$y>=0&&$x<0&&$y**2+$x**2<=$r**2||$y<0&&$x<0&&$y>=-$r/2&&$x>=-$r){
        echo '<p id = "script"> Точка ('.$x.'; '.$y.') при параметре R = '.$r.' попала в закрашенную область!
                    <figure class="img">
                        <img height="200px"
                             src="img\yes.png"
                             width="200px"
                        >
                    </figure>
                </p>';
}else{

        echo '<p id = "script"> Точка ('.$x.'; '.$y.') при параметре R = '.$r.' не попала в закрашенную область!
                    <figure class="img">
                        <img height="200px"
                             src="img\no.png"
                             width="200px"
                        >
                    </figure>
                </p>';
}
?>