<?php

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class Images extends \yii\db\ActiveRecord
{
    public $file = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at',],

                ],
                // если вместо метки времени UNIX используется datetime:
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
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['file'], 'image', 'maxFiles' => 5],
            [['created_at'], 'safe'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Наименование изображения',
            'file' => 'Фото',
            'created_at' => 'Добавлено',
        ];
    }
}
