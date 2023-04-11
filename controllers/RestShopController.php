<?php

namespace app\controllers;

use app\models\shop\ShopC;
use app\models\shop\ShopCity;
use app\models\shop\ShopCounrty;
use yii\rest\ActiveController;


class RestShopController extends ActiveController
{
    public $modelClass = 'app\models\shop\shop';
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
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionCountry()
    {
        return ShopCounrty::find()->all();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionCity($id)
    {
        return ShopCity::find()->where(['shop_country_id' => $id])->all();
    }

    /**
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionShop($id)
    {
        return ShopC::find()->where(['shop_city_id' => $id])->all();
    }


}
