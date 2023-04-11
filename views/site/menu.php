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

    <h2>Таблица menu</h2>
    <h3>Read (чтение всех) </h3>
    Запрос <br>
    <code> GET http://24api.ru/rest-menu</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <p>Возвращает</p>
    <code> [
        {
        "id": 1,
        "name": "Пицца"
        },
        {
        "id": 2,
        "name": "Комбо"
        }
        ]</code>
    <hr>


    <h3>Create (создать) </h3>
    Запрос <br>
    <code> POST http://24api.ru/rest-menu </code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <code>

        {
        "name": "Пример post"
        }
    </code><br>
    <p>Возвращает</p>
    <code> {
        "name": "Пример post",
        "id": 3
        }</code>
    <hr>

    <h3>Read (чтение одного) </h3>
    Запрос <br>
    <code> GET http://24api.ru/rest-menu/1</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>

    <p>Возвращает</p>
    <code>
        {
        "id": 1,
        "name": "Пицца"
        }</code>
    <hr>


    <h3>Update (обновление) </h3>
    Запрос <br>
    <code> PUT http://24api.ru/rest-menu/3</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>
    <code>

        {
        "name": "Пример post 2"
        }
    </code><br>
    <p>Возвращает</p>
    <code>
        {
        "id": 3,
        "name": "Пример post 2"
        }
    </code>
    <hr>


    <h3>Delete (удаление) </h3>
    Запрос <br>
    <code>DELETE http://24api.ru/rest-menu/3</code> <br>
    <code>Content-Type: application/json; charset=UTF-8</code><br>

    <p>Возвращает</p>
    <code>
         Response body is empty <br>
        Response code: 204 (No Content)
    </code>
    <hr>
</div>
</div>
