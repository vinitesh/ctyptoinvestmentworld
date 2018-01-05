<?php

namespace frontend\modules\user\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property string $avatar
 * @property string $about
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $region
 * @property string $postcode
 * @property integer $status
 * @property integer $role
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $last_login_ip
 * @property string $last_login_info
 * @property integer $verified
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'first_name', 'last_name'], 'required'],
            [['first_name', 'last_name', 'password_hash', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone' => 'Phone',
            'avatar' => 'Avatar',
            'about' => 'About',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'region' => 'Region',
            'postcode' => 'Postcode',
            'status' => 'Status',
            'role' => 'Role',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'last_login_ip' => 'Last Login Ip',
            'last_login_info' => 'Last Login Info',
            'verified' => 'Verified',
        ];
    }
    
    public function getFullName() {
	return $this->first_name ? $this->first_name . ' ' . $this->last_name : $this->username;
    }
}
