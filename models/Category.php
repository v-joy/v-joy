<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $fatherId
 * @property string $type
 * @property integer $weight
 * @property integer $createTime
 * @property integer $createId
 */
class Category extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public static function showName(){
        return "类别";
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fatherId', 'weight', 'createTime', 'createId'], 'integer'],
            [['type', 'createTime', 'createId'], 'required'],
            [['name', 'type'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '名称',
            'fatherId' => 'Father ID',
            'type' => '类型',
            'weight' => '权重',
            'createTime' => '创建时间',
            'createId' => '创建者',
        ];
    }
}
