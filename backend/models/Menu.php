<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keywords
 * @property integer $status
 * @property integer $order_number
 * @property integer $visible_type
 */
class Menu extends \yii\db\ActiveRecord
{
    const SHOW_FOR_ALL = 1;
    const SHOW_FOR_GUESTS = 2;
    const SHOW_FOR_REGISTERED = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'order_number', 'visible_type'], 'required'],
            [['meta_desc', 'meta_keywords'], 'string'],
            [['status', 'order_number', 'visible_type'], 'integer'],
            [['title', 'url', 'meta_title'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keywords' => 'Meta Keywords',
            'status' => 'Status',
	    'order_number' => 'Order number',
	    'visible_type' => 'Show for'
        ];
    }
}
