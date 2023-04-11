<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $alt
 * @property string $src
 * @property string|null $desc
 */
class Slider extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['src'], 'required'],
            [['alt'], 'string', 'max' => 250],
            [['src', 'desc'], 'string', 'max' => 255],
             [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alt' => 'Атрибут Alt',
            'src' => 'Картинка',
            'imageFile' => 'Картинка',
            'desc' => 'Описание',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {

        if ($this->imageFile) {
            $path = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->src = '/web/'.$path;
            $this->imageFile->saveAs($path);
            return true;
        } else {
            return false;
        }
    }

}
