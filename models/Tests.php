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
            [['startdate', 'enddate'], 'safe'],
            [['categoriesID'], 'integer'],
            [['testname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'testsid' => 'Testsid',
            'testname' => 'Test name',
            'startdate' => 'Start date',
            'enddate' => 'End date',
            'categoriesID' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getсompletedtests()
    {
        return $this->hasMany(сompletedtests::className(), ['test_TestID' => 'testsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerOfTests()
    {
        return $this->hasMany(AnswerOfTest::className(), ['testid' => 'testsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['categoriesID' => 'categoriesID']);
    }
}