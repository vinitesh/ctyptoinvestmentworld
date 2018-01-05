<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $url
 * @property string $description
 * @property integer $show_button
 * @property string $button_text
 * @property integer $status
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['description'], 'string'],
            [['show_button', 'status'], 'integer'],
            [['title', 'image', 'url', 'button_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'image' => 'Image',
            'url' => 'Url',
            'description' => 'Description',
            'show_button' => 'Show Button',
            'button_text' => 'Button Text',
            'status' => 'Status',
        ];
    }
}
