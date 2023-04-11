<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">API</h1>

        <p class="lead">Исходники figma ниже</p>

        <p><a class="btn btn-lg btn-success" href="https://www.figma.com/file/oSOvGO9Embcc1wYeNyU6bm/Dodo-Pizza-(base)?node-id=1%3A2">Перейти к исходникам!</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Структура БД</h2>
                <a href="/web/img/db.png">
                <?= \yii\helpers\Html::img("/web/img/db.png", ["width" => "200px"]) ?>
                </a>
            </div>
            <div class="col-lg-4">
                <h2>Пример запроса fetch</h2>

                <p>
                <pre><code>
const response = fetch('http://24api.ru/rest-menu',
    method: 'GET',
    credentials: 'same-origin',
    headers: {
    'Content-Type': 'application/json',
            },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer'

                        })  </code>
</pre>
              </p>

            </div>
            <div class="col-lg-4">
                <h2>Задание</h2>

                <p><ol>
                    <li> Сверстать страницы сайта</li>
                    <li> Все повторяющиеся элементы должны генерироваться методами js</li>
                    <li> Все данные берутся с REST</li>
                    <li> Слайдер (и другие элементы, к примеру формы) должны быть рабочими</li>
                    <li> * Выбранные товары добавляются в localStorage </li>
                    <li> * Пользователь может оформить заказ и посмотреть список заказов (REST пока в разработке =) ) </li>

                </ol></p>


            </div>
        </div>

    </div>
</div>
