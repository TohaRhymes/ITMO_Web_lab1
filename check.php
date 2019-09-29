<?php

//Три проверки x,r - целые; y - рациональное, количество знаков <=15. x [-4,..., 4] , y {-5...3} , r [1,..., 5]


$flagX = true;
$flagY = true;
$flagR = true;


if (!is_numeric($x) || !is_int($x + 0)) {
    $flagX = false;
    if ($justCheck) {
        echo "notX\n";
    } else {
        echo "<p class = 'scriptError'>x должно быть целым числом от -4 до 4.</p>";
    }
}
if (!is_numeric($y)) {
    $flagY = false;
    if ($justCheck) {
        echo "notNumY\n";
    } else {
        echo "<p class = 'scriptError'>y должно быть рациональным числом от -5 до 3.</p>";
    }
}
if (!is_numeric($r) || !is_int($r + 0)) {
    $flagR = false;
    if ($justCheck) {
        echo "notR\n";
    } else {
        echo "<p class = 'scriptError'>r должно быть целым числом от 1 до 5.</p>";
    }
}
if (($x < -4 || $x > 4) && $flagX) {
    $flagX = false;
    if ($justCheck) {
        echo "notX\n";
    } else {
        echo "<p class = 'scriptError'>x должно быть целым числом от -4 до 4.</p>";
    }
}
if ((strlen(substr(strrchr($y, "."), 1)) > 15) && flagY) {
    $flagY = false;
    if ($justCheck) {
        echo "shorterY\n";
    } else {
        echo "<p class = 'scriptError'>В поле ввода y введите число, количество цифр после запятой у которого не больше 15.</p>";
    }
}
if (($y < -5 || $y > 3) && flagY) {
    $flagY = false;
    if ($justCheck) {
        echo "notY\n";
    } else {
        echo "<p class = 'scriptError'>y должно быть рациональным числом от -5 до 3.</p>";
    }
}

if (($r < 1 || $r > 5) && flagR) {
    $flagR = false;
    if ($justCheck) {
        echo "notR\n";
    } else {
        echo "<p class = 'scriptError'>r должно быть целым числом от 1 до 5.</p>";
    }
}
if ($flagX && $flagR && $flagY) {
    if($justCheck)
    echo "allRight\n";
}else{
    $justCheck=true;
}

?>



