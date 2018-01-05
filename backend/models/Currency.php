<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property string $title
 * @property string $letter
 * @property string $logo
 * @property string $short_title
 * @property string $rate
 * @property integer $status
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'logo', 'short_title', 'rate'], 'required'],
            [['rate'], 'number'],
            [['status','order_number'], 'integer'],
            [['title', 'logo'], 'string', 'max' => 255],
            [['letter', 'short_title'], 'string', 'max' => 5],
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
            'letter' => 'Letter',
            'logo' => 'Logo',
            'short_title' => 'Short Title',
            'rate' => 'Rate',
            'status' => 'Status',
	    'order_number' => 'Order number'
        ];
    }
}
