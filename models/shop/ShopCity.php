<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "shop_city".
 *
 * @property int $id
 * @property string $name
 * @property int|null $shop_country_id
 *
 * @property ShopCounrty $shopCountry
 * @property Shop[] $shops
 */
class ShopCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['shop_country_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['shop_country_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopCounrty::className(), 'targetAttribute' => ['shop_country_id' => 'id']],
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
            'shop_country_id' => 'Shop Country ID',
        ];
    }

    /**
     * Gets query for [[ShopCountry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopCountry()
    {
        return $this->hasOne(ShopCounrty::className(), ['id' => 'shop_country_id']);
    }

    /**
     * Gets query for [[Shops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['shop_city_id' => 'id']);
    }
}
