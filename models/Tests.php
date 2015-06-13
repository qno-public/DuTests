<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tests".
 *
 * @property integer $testsid
 * @property string $testname
 * @property string $startdate
 * @property string $enddate
 * @property integer $categoriesID
 *
 * @property сompletedtests[] $�ompletedtests
 * @property AnswerOfTest[] $answerOfTests
 * @property Categories $categories
 */
class Tests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startDate', 'endDate'], 'safe'],
            [['categoryId'], 'integer'],
            [['testName'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'testId' => 'Testsid',
            'testName' => 'Test name',
            'startDate' => 'Start date',
            'endDate' => 'End date',
            'categoryId' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompletedtests()
    {
        return $this->hasMany(Completedtests::className(), ['testId' => 'testId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerOfTests()
    {
        return $this->hasMany(AnswerOfTest::className(), ['testId' => 'testId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['categoryId' => 'categoryId']);
    }
}
