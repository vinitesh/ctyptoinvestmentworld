<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currencies".
 *
 * @property integer $id
 * @property string $title
 * @property string $iso_code
 * @property string $letter
 */
class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'iso_code', 'letter'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['iso_code'], 'string', 'max' => 5],
            [['letter'], 'string', 'max' => 3],
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
            'iso_code' => 'Iso Code',
            'letter' => 'Letter',
        ];
    }
}
