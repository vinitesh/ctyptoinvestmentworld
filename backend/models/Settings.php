<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $email
 * @property string $main_site_url
 * @property string $default_meta_title
 * @property string $default_meta_description
 * @property string $default_meta_keywords
 * @property string $logo
 * @property integer $status
 * @property string $favicon
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'main_site_url', 'procent'], 'required'],
            [['status'], 'integer'],
            [['default_meta_description', 'default_meta_keywords'], 'string'],
            [['email', 'main_site_url', 'logo', 'logo_text'], 'string', 'max' => 255],
            [['default_meta_title', 'favicon'], 'string', 'max' => 500],
	    [['procent'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'main_site_url' => 'Main Site Url',
            'default_meta_title' => 'Default Meta Title',
            'default_meta_description' => 'Default Meta Description',
            'default_meta_keywords' => 'Default Meta Keywords',
            'logo' => 'Logo',
            'status' => 'Status',
	    'logo_text' => 'Logo Text',
	    'procent' => 'Percentage of mark-up',
        ];
    }    
}
