<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ranklist".
 *
 * @property integer $id
 * @property string $name
 * @property string $subname
 * @property integer $userId
 * @property integer $createTime
 * @property integer $status
 */
class Ranklist extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ranklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'subname', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'subname'], 'string', 'max' =>100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'name' => '主标题',
            'subname' => '副标题',
            'userId' => '创建用户',
            'createTime' => '创建时间',
            'status' => '状态',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'userId']);
    }

    public function getRankitems()
    {
        return $this->hasMany(Rankitem::className(), ['rankId' => 'id']);
    }

    public function format() {
        $attr = $this->getAttributes();
        $attr['rankitems'] = [];
        foreach ($this->rankitems as $rankitem) {
            $attr['rankitems'][] = $rankitem->format();
        }
        return $attr;
    }
}
