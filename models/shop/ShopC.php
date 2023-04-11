<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $name
 * @property string|null $adress
 * @property int|null $index
 * @property int|null $shop_city_id
 *
 * @property ShopCity $shopCity
 */
class ShopC extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['index', 'shop_city_id'], 'integer'],
            [['name', 'adress'], 'string', 'max' => 255],
            [['shop_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopCity::className(), 'targetAttribute' => ['shop_city_id' => 'id']],
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
            'adress' => 'Adress',
            'index' => 'Index',
            'shop_city_id' => 'Shop City ID',
        ];
    }

    /**
     * Gets query for [[ShopCity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShopCity()
    {
        return $this->hasOne(ShopCity::className(), ['id' => 'shop_city_id']);
    }
}
