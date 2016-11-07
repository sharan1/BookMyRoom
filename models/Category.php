<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Category".
 *
 * @property integer $CategoryID
 * @property string $CategoryName
 * @property integer $IsActive
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IsActive'], 'integer'],
            [['CategoryName'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CategoryID' => 'Category ID',
            'CategoryName' => 'Category Name',
            'IsActive' => 'Is Active',
        ];
    }
}
