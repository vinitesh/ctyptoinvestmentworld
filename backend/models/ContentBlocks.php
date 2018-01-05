<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content_blocks".
 *
 * @property integer $id
 * @property string $title
 * @property integer $show_title
 * @property string $position
 * @property string $text
 * @property integer $status
 */
class ContentBlocks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_blocks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'show_title', 'position', 'text', 'status'], 'required'],
            [['show_title', 'status'], 'integer'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['position'], 'string', 'max' => 50],
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
            'show_title' => 'Show Title',
            'position' => 'Position',
            'text' => 'Text',
            'status' => 'Status',
        ];
    }
}
