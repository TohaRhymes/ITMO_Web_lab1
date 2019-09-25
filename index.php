<!DOCTYPE html>
<html lang="ru" xmlns:float="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>First checker</title>
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

        /*.button:hover {*/
        /*    color: black;*/
        /*    border-color: #6ccf5a;*/
        /*    background: -webkit-gradient(linear, 0 0, 0 100%, from(#6ed54b), to(#289c44));*/
        /*}*/

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

        #Y:invalid{
            background-color: red;
        }

    </style>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">-->
<!--    </script>-->
<!--    <script>-->
<!--        $(document).ready (function () {-->
<!--            // блокируем кнопку отправки до того момента, пока все поля не будут проверены-->
<!--            $('.submit').prop('disabled', true);-->
<!---->
<!--            // elements содержит количество элементов для валидации-->
<!--            var elements = $('.validation').length;-->
<!---->
<!--            // has содержит количество элементов успешно прощедших валидацию-->
<!--            var has;-->
<!---->
<!--            // при изменении значения поля-->
<!--            $('.validation').change(function() {-->
<!---->
<!--                // формируем массив для отправки на сервер, нас интересуют значение поля и css-классы-->
<!--                //на сервере массив будет доступен в виде $_POST['validation']['name']['value'] и т.п.-->
<!--                var name = $(this).attr('name');-->
<!--                var data = {};-->
<!--                data['validation[' + name + '][value]'] = $(this).val();-->
<!--                data['validation[' + name + '][class]'] = $(this).attr('class');-->
<!---->
<!--                // делаем ajax-запрос методом POST на текущий адрес, в ответ ждем данные HTML-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: '',-->
<!--                    dataType: 'html',-->
<!--                    data: data,-->
<!--                    // до выполнения запроса удаляем блок с предыдущими сообщениями-->
<!--                    beforeSend: function()-->
<!--                    {-->
<!--                        $('#row-' + name + ' div.msg').remove();-->
<!--                    },-->
<!--                    // в случае удачного выполнения добавляем блок с сообщением-->
<!--                    success: function(msg)-->
<!--                    {-->
<!--                        $('#row-' + name).append(msg);-->
<!--                    }-->
<!--                });-->
<!---->
<!--                // проверяем, все ли поля прошли валидацию (признак - css-класс "ok" у блока сообщения) и разблокируем кнопку отправки на сервер-->
<!--                has = $('.row:has(div.ok)').length + 1;-->
<!--                if (has == elements)-->
<!--                {-->
<!--                    $('.submit').prop('disabled', false);-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    </script>-->
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
        <tr>
            <th colspan="2"> Определение попадания точки в область</th>
        </tr>
        <tr>
            <td width="50%">
                <table width="100%">
                    <form action="select.php" method="get"
                          onsubmit="return checkAndDraw(document.getElementById('X').value, document.getElementById('Y').value, document.getElementById('R').value)"
                          >
                        <p class="inputField">Координата X: <select id="X" name="X" required class="validation noempty">
                            <option disabled selected></option>
                            <option value="-4">-4</option>
                            <option value="-3">-3</option>
                            <option value="-2">-2</option>
                            <option value="-1">-1</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></p>
                        <p class="inputField">Координата Y:
                            <input class="validation noempty" id="Y" name="Y" placeholder="Число от -5 до 3." size="20px" type="text" >
                        </p>
                        <p class="inputField">Радиус R: <select class="validation noempty" id="R" name="R" required>
                            <option disabled selected></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></p>
                        <p><input class="button" id="button1" type="submit" value="Отправить">
                            <input class="submit button" onclick="makeYWhite()" type="reset" value="Очистить"></p>
                    </form>
                    <div id="ans"> </div>
                </table>
            </td>
            <td width="50%">
                <canvas id="canvas" width=237px height=215px></canvas>
                <img width="0" height="0" src='img/areas.png' id='img'/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>
                    <iframe name="answer"></iframe>
                </p>
            </td>
        </tr>
    </table>


</div>

<script>

    // var code = prompt("Это секретная разработка, введи пин, чтобы получить доступ. У тебя одна попытка!");
    // if(!check(code)||code != 12345){
    //     while(true){
    //         alert("Доступ заблокирован.");
    //     }
    // }

    //В нижеследующем коде растягивается канвас и вставляется картинка графика
    function ge(id) {
        return document.getElementById(id);
    }

    const canvas = ge('canvas');
    const ctx = canvas.getContext('2d');
    const canvasWidth = canvas.width;
    const canvasHeight = canvas.height;
    const img = ge('img');
    ctx.drawImage(img, 0, 0);
    ctx.fill();
    //Растянули canvas

    //Установка точки на графике
    var circle = function (x, y, r) {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "white";
        ctx.beginPath();
        ctx.drawImage(img, 0, 0);
        ctx.arc(x, y, r, 0, Math.PI * 2, false);
        ctx.fill();

    }
    var drawDote = function (x, y) {
        dote = circle(x, y, 3)
    }

    var dote;


    function makeYWhite() {
        document.getElementById('Y').style.backgroundColor = "#ffffff";
    }

    function isNumber(n) {
        return /^-?[\d.]+(?:e-?\d+)?$/.test(n);
    }


    // function checkAndDraw(form) {
    //
    //     var fail;
    //
    //
    //     console.log(y);
    //     var f = isNumber(y);
    //     if (!f) {
    //         document.getElementById('Y').style.backgroundColor = "#ff7679";
    //         alert("В поле координаты Y введите число от -5 до 3!");
    //         return false;
    //     } else {
    //         if (y >= -5 && y <= 3) {
    //             document.getElementById('Y').style.backgroundColor = "#ffffff";
    //             console.log(document.getElementById('X').value);
    //             var canvasX = 110.5 + (x / r) * 79;
    //             var canvasY = 110 - (y / r) * 79;
    //             drawDote(canvasX, canvasY);
    //             return true;
    //         } else {
    //             document.getElementById('Y').style.backgroundColor = "#ff7679";
    //             alert("В поле координаты Y введите число от -5 до 3!");
    //             return false;
    //         }
    //     }
    // }

    function checkAndDraw(x, y, r) {
        console.log(y);
        var mes;
        var f = isNumber(y);
        if (!f) {
            document.getElementById('Y').style.backgroundColor = "#ff7679";
            mes = "В поле координаты Y введите число от -5 до 3!";
            document.getElementById("ans").innerHTML=mes;
            return false;
        } else {
            if (y >= -5 && y <= 3) {
                document.getElementById('Y').style.backgroundColor = "#ffffff";
                console.log(document.getElementById('X').value);
                var canvasX = 110.5 + (x / r) * 79;
                var canvasY = 110 - (y / r) * 79;
                drawDote(canvasX, canvasY);
                return true;
            } else {
                document.getElementById('Y').style.backgroundColor = "#ff7679";
                mes = "В поле координаты Y введите число от -5 до 3!";
                document.getElementById("ans").innerHTML=mes;
                return false;
            }
        }
    }



    function makeFrame(id){
        var iframe = document.getElementById(id);
        iframe.style.display="block";
        frameFitting(id);
        for (var i=0; i<iframe.length; i++) {
            iframe[i].onclick = function() {
                clearInterval(timeout);
                timeout = setInterval("frameFitting(id)",100);
            }
        }
    }

    function frameFitting(id) {
        document.getElementById(id).width = '100%';
        document.getElementById(id).height = document.getElementById(id).contentWindow.
            document.body.scrollHeight+35+'px';
    }



</script>

</body>
</html>