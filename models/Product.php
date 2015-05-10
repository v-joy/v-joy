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
            [['categoryId', 'name', 'price', 'description', 'userId', 'createTime'], 'required','message'=>'不能为空'],
            [['categoryId', 'userId', 'createTime', 'status'], 'integer','message'=>'必须是整数'],
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
            'name' => '名称',
            'price' => '价格',
            'description' => '描述',
            'userId' => '所属用户',
            'createTime' => '创建时间',
            'status' => '状态',
        ];
    }
}
