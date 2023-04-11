<?php

namespace app\controllers;

use app\models\Menu;
use app\models\Tasks;
use app\models\Todo;
use yii\base\BaseObject;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class RestTodoController extends ActiveController
{
    public $modelClass = 'app\models\Tasks';
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


    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionItemsById($id){
        return Tasks::find()->where(['user_id' => $id])->all();
    }

    public function actionDeleteItems(){
        $data =\Yii::$app->request->post();
        if (Tasks::DeleteAll(["id" => $data["items"]])){
            return true;
        }
        return false;
    }



}
