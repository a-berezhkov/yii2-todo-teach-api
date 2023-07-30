<?php
namespace app\controllers;

use app\models\NewsCategory;
use yii\rest\ActiveController;

class RestNewsCategoryController extends ActiveController
{
    public $modelClass = 'app\models\NewsCategory';
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
    public function actionCategoryByUserId($id){
        return NewsCategory::find()->where(['created_by' => $id])->all();
    }
}
