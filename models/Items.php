<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property string $image
 * @property int $is_collect
 * @property float $price
 * @property int $is_new
 * @property int $is_active
 * @property int|null $category_id
 *
 * @property Category $category
 * @property User $user
 */
class Items extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'desc', 'image', 'is_collect', 'price'], 'required'],
            [['desc'], 'string'],
            [['is_collect', 'is_new', 'is_active', 'category_id'], 'integer'],
            [['price'], 'number'],
            [['name', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'desc' => 'Описание',
            'image' => 'Картинка',
            'is_collect' => 'Собирается?',
            'price' => 'Цена',
            'is_new' => 'Новый?',
            'is_active' => 'Активный?',
            'category_id' => 'Категория',
            'imageFile' => 'Картинка',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return bool
     */
    public function upload()
    {
        $path = '/web/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
        $this->image = $path;
        if ($this->validate()) {
            $this->imageFile->saveAs($path);
            return true;
        } else {
            return false;
        }
    }
}
