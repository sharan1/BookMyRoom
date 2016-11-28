<?php

namespace app\models;

use Yii;
use app\models\Area;

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
            [['Name','AreaID'], 'required'],
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
            'WorkspaceID' => 'Workspace',
            'Name' => 'Name',
            'AreaID' => 'Area',
            'Capacity' => 'Capacity',
            'IsActive' => 'Is Active',
            'AdditionalInfo' => 'Additional Info',
        ];
    }

    public function getArea()
    {
        return $this->hasOne(Area::className(), ['AreaID' => 'AreaID']);
        //return Area::find()->where(['AreaID' => $this->AreaID])->one();
    }
}
