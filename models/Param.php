<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "param".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $fatherId
 * @property integer $createTime
 */
class Param extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value', 'fatherId', 'createTime'], 'required'],
            [['fatherId', 'weight', 'createTime'], 'integer'],
            [['name'], 'string', 'max' => 31],
            [['value'], 'string', 'max' => 128]
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
            'value' => '值',
            'fatherId' => '父类',
            'weight' => '权重',
            'createTime' => '创建时间',
        ];
    }

    public static function Params($name,$select = "*"){
        $type = Param::find()->select('id')->where(['name'=>$name])->orderBy("weight desc")->one();
        return Param::find()->select($select)->where(["fatherId"=>$type->id])->orderBy("weight desc")->all();
    }
}
