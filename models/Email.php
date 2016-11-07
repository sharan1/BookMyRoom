<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Email".
 *
 * @property integer $MailID
 * @property integer $Type
 * @property string $ToEmail
 * @property string $Body
 * @property string $SentOn
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Type'], 'integer'],
            [['Body'], 'string'],
            [['SentOn'], 'safe'],
            [['ToEmail'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MailID' => 'Mail ID',
            'Type' => 'Type',
            'ToEmail' => 'To Email',
            'Body' => 'Body',
            'SentOn' => 'Sent On',
        ];
    }
}
