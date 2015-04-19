<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $type
 * @property integer $belongId
 * @property integer $createTime
 */
class Image extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'url', 'type', 'belongId', 'createTime'], 'required'],
            [['id', 'belongId', 'createTime'], 'integer'],
            [['name', 'type'], 'string', 'max' => 31],
            [['url'], 'string', 'max' => 128]
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
            'url' => 'URL',
            'type' => '类型',
            'belongId' => '所属id',
            'createTime' => '创建时间',
        ];
    }
}