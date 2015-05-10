<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $userId
 * @property integer $createTime
 * @property integer $categoryId
 * @property integer $status
 */
class Article extends Base
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'userId', 'createTime', 'categoryId'], 'required','message'=>'不能为空'],
            [['id', 'userId', 'createTime', 'categoryId', 'status'], 'integer','message'=>'必须是整数'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '题目',
            'content' => '正文',
            'userId' => '用户 ID',
            'createTime' => '创建时间',
            'categoryId' => '类别id',
            'status' => '状态',
        ];
    }
}
