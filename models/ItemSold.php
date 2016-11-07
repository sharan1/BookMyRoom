<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ItemSold".
 *
 * @property integer $ItemID
 * @property integer $CustomerID
 * @property string $AddedOn
 * @property integer $AddedBy
 */
class ItemSold extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ItemSold';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CustomerID', 'AddedBy'], 'integer'],
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
            'CustomerID' => 'Customer ID',
            'AddedOn' => 'Added On',
            'AddedBy' => 'Added By',
        ];
    }
}
