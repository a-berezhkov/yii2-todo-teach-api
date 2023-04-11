<?php

namespace app\controllers;

use app\models\Menu;
use app\models\Tasks;
use app\models\User;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\helpers\VarDumper;
use yii\rest\ActiveController;
use yii\web\Response;

class RestUserController extends ActiveController
{
    public $modelClass = 'app\models\RestUser';
    public $enableCsrfValidation = false;


    public static function allowedDomains()
    {
        return [
            '*',                        // star allows all domains

        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to domains:
                    'Origin' => static::allowedDomains(),
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionAuth()
    {
        $data = \Yii::$app->request->post();
        if (isset($data['username'])){
            return User::find()->where(['username' =>$data['username']])->andWhere(['password_hash' =>$data['password_hash']])->one();
        } else {
            return $data;
        }

    }

}
