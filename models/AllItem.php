<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "AllItem".
 *
 * @property integer $ItemID
 * @property integer $DonationID
 * @property integer $Size
 * @property integer $BrandID
 * @property integer $IsPriceDec
 * @property integer $IsActive
 * @property string $AddedOn
 * @property integer $AddedBy
 */
class AllItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AllItem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DonationID', 'AddedBy'], 'required'],
            [['DonationID', 'Size', 'BrandID', 'IsPriceDec', 'IsActive', 'AddedBy'], 'integer'],
            [['AddedOn'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ItemID' => 'Item ID',
            'DonationID' => 'Donation ID',
            'Size' => 'Size',
            'BrandID' => 'Brand ID',
            'IsPriceDec' => 'Is Price Dec',
            'IsActive' => 'Is Active',
            'AddedOn' => 'Added On',
            'AddedBy' => 'Added By',
        ];
    }
}
