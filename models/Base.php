<?php

namespace app\models;

use Yii;

class Base extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        ];
    }

    public static function toArr($models){
        $array = [];
        foreach ((array)$models as $model) {
            $array[] = $model->getAttributes();
        }
        return $array;
    }

    public function save($runValidation = true, $attributeNames = NULL){
        if($this->isNewRecord){
            if($this->hasAttribute("createTime")){
                $this->createTime = time();
            }
            if($this->hasAttribute("userId")) {
                $this->userId = Yii::$app->user->id;
            }
        }
        return parent::save($runValidation,$attributeNames);
    }

}
