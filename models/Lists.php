<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "list".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property integer $fatherId
 * @property integer $createTime
 */
class Lists extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'value', 'fatherId', 'createTime'], 'required'],
            [['id', 'fatherId', 'createTime'], 'integer'],
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
            'createTime' => '创建时间',
        ];
    }
}
