<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_logins".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $ip
 * @property string $os
 * @property integer $session_start
 * @property integer $session_finished
 * @property string $session_id
 */
class UserLogins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_logins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'os', 'session_start', 'session_id'], 'required'],
            [['user_id', 'session_start', 'session_finished'], 'integer'],
            [['ip'], 'string', 'max' => 15],
            [['os', 'session_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'os' => 'Os',
            'session_start' => 'Session Start',
            'session_finished' => 'Session Finished',
            'session_id' => 'Session ID',
        ];
    }
}
