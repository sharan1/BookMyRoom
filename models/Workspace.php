<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Workspace".
 *
 * @property integer $WorkspaceID
 * @property string $Name
 * @property integer $AreaID
 * @property integer $Capacity
 * @property integer $IsActive
 * @property string $AdditionalInfo
 */
class Workspace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Workspace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AreaID'], 'required'],
            [['AreaID', 'Capacity', 'IsActive'], 'integer'],
            [['AdditionalInfo'], 'string'],
            [['Name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'WorkspaceID' => 'Workspace ID',
            'Name' => 'Name',
            'AreaID' => 'Area ID',
            'Capacity' => 'Capacity',
            'IsActive' => 'Is Active',
            'AdditionalInfo' => 'Additional Info',
        ];
    }
}
