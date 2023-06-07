<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property string $name
 * @property int|null $isDone
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $todo_id
 * @property int|null $user_id
 *
 * @property Todo $todo
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name'], 'required'],
            [[ 'isDone', 'todo_id'], 'integer'],
            [['name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['id'], 'unique'],
            [['todo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Todo::className(), 'targetAttribute' => ['todo_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'isDone' => 'Is Done',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'todo_id' => 'Todo ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Todo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTodo()
    {
        return $this->hasOne(Todo::className(), ['id' => 'todo_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
