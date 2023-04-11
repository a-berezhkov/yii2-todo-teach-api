<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "shop_counrty".
 *
 * @property int $id
 * @property string $name
 *
 * @property ShopCity[] $shopCities
 */
class ShopCounrty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_counrty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ShopCities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopCities()
    {
        return $this->hasMany(ShopCity::className(), ['shop_country_id' => 'id']);
    }
}
