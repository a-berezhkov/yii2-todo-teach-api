<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'SC | BC',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'S5rVAW_IElEdZuY3h4DZpsQap-s6F9dc',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'application/xml' => 'yii\web\JsonParser',
            ],
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
           // 'enableAutoLogin' => true,
            'enableSession' =>true
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-menu', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-category', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-slider', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-items', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-user', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-todo', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-news-category', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-news', 'pluralize' => false],
                ['class' => 'yii\rest\UrlRule', 'controller' => 'rest-shop', 'pluralize' => false],

            ],
            'showScriptName' => false,
            'enablePrettyUrl' => true,


        ],


    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '94.25.228.123','94.72.6.236'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
