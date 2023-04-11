<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Додо';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">

    <h2>Таблица slider</h2>
    <h3>Read (чтение всех) </h3>
    Запрос <br>
    <code> GET http://24api.ru/rest-slider</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <p>Возвращает</p>
    <code> [ {
        "id": 1,
        "alt": "тест",
        "src": "/web/uploads/test.jpeg",
        "desc": "тест"
        }]
    </code>
    <hr>

    <h3>Read (чтение одного) </h3>
    Запрос <br>
    <code> GET http://24api.ru/rest-slider/1</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>

    <p>Возвращает</p>
    <code>
        {
        "id": 1,
        "alt": "тест",
        "src": "/web/uploads/test.jpeg",
        "desc": "тест"
        }</code>
    <hr>


    <h3>Update (обновление) </h3>
    <b style="color: red;"> Нужно использовать <code> new FormData();</code> для передачи файлов</b>
    <br>
    Запрос <br>
    <code> PUT http://24api.ru/rest-slider/4</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <code>
        {
        "src": "323232",
        "alt": "7",
        "desc": "7"
        }
    </code><br>
    <p>Возвращает</p>
    <code>
        {
        "id": 4,
        "alt": "7",
        "src": "323232",
        "desc": "7"
        }
    </code>
    <hr>


    <h3>Delete (удаление) </h3>
    Запрос <br>
    <code>DELETE http://24api.ru/rest-slider/3</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>

    <p>Возвращает</p>
    <code>
        Response body is empty <br>
        Response code: 204 (No Content)
    </code>
    <hr>


    <h3>Create (создать) </h3>
    Запрос <br>
    <code> POST http://24api.ru/rest-slider </code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <code>

        {
        "src": "323232",
        "alt": "7",
        "desc": "7"
        }
    </code><br>
    <p>Возвращает</p>
    <code>   {
        "id": 4,
        "alt": "7",
        "src": "323232",
        "desc": "7"
        }</code>
    <hr>
</div>
</div>
