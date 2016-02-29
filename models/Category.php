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
 * @property integer $userId
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
            [['fatherId', 'weight'], 'integer'],
            [['type'], 'required'],
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
            'fatherId' => '父类',
            'type' => '类型',
            'weight' => '权重',
            'createTime' => '创建时间',
            'userId' => '创建者',
        ];
    }

    public static function getType($type,$select = "*"){
        return Category::find()->select($select)->where(["type"=>$type])->orderBy("weight desc")->all();
    }

    public static function getTopType($select = "*"){
        return Category::find()->select($select)->where(["fatherId"=>0])->orderBy("weight desc")->all();
    }
}
