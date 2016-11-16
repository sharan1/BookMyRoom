<?php

namespace app\models;

use Yii;
use app\models\Users;

/**
 * This is the model class for table "BookingRequest".
 *
 * @property integer $RequestID
 * @property integer $UserID
 * @property string $RequestedOn
 * @property string $StartTime
 * @property string $EndTime
 * @property string $Reason
 * @property integer $Booking_Status
 * @property string $Additional_Info
 * @property string $Last_Updated
 */
class BookingRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'BookingRequest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserID'], 'required'],
            [['UserID', 'Booking_Status'], 'integer'],
            [['RequestedOn', 'StartTime', 'EndTime', 'Last_Updated'], 'safe'],
            [['Reason', 'Additional_Info'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RequestID' => 'Request ID',
            'UserID' => 'Requestor',
            'RequestedOn' => 'Requested On',
            'StartTime' => 'Start Time',
            'EndTime' => 'End Time',
            'Reason' => 'Reason',
            'Booking_Status' => 'Booking  Status',
            'Additional_Info' => 'Additional  Info',
            'Last_Updated' => 'Last  Updated',
        ];
    }

    public function getUser()
    {
        return Users::find()->where(['UserID' => $this->UserID])->one();
    }
    
}
