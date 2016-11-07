<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Donation".
 *
 * @property integer $DonationID
 * @property string $TaxDocLoc
 * @property integer $PersonID
 * @property integer $NumItems
 * @property string $AddedOn
 * @property integer $AddedBy
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Donation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TaxDocLoc'], 'string'],
            [['PersonID', 'NumItems', 'AddedBy'], 'integer'],
            [['NumItems'], 'required'],
            [['AddedOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DonationID' => 'Donation ID',
            'TaxDocLoc' => 'Tax Doc Loc',
            'PersonID' => 'Person ID',
            'NumItems' => 'Num Items',
            'AddedOn' => 'Added On',
            'AddedBy' => 'Added By',
        ];
    }
}
