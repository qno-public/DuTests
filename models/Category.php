<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $categoriesID
 * @property string $name
 * @property integer $userid
 * @property string $createdin
 *
 * @property Users $user
 * @property Tests[] $tests
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoriesId' => 'Categories ID',
            'category' => 'Name'
        ];
    }

}
