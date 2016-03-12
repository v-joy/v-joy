<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $categoryId
 * @property string $name
 * @property string $price
 * @property string $description
 * @property integer $userId
 * @property integer $createTime
 * @property integer $status
 */
class Product extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryId', 'name', 'chinesename', 'score', 'platform',  'description'], 'required'],
            [['categoryId',  'status'], 'integer'],
            [['description'], 'string'],
            [['name', 'price'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'categoryId' => '所属类别',
            'name' => '英文名称',
            'description' => '描述',
            'userId' => '所属用户',
            'createTime' => '创建时间',
            'status' => '状态',
// add attributes
            'platform' => '支持平台',
            'chinesename' => '中文名称',
            'score' => '评分',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'userId']);
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'categoryId']);
    }
}
