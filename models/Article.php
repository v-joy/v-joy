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
            [['id', 'title', 'content', 'userId', 'createTime', 'categoryId'], 'required'],
            [['id', 'userId', 'createTime', 'categoryId', 'status'], 'integer'],
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
            'title' => 'Title',
            'content' => 'Content',
            'userId' => 'User ID',
            'createTime' => 'Create Time',
            'categoryId' => 'Category ID',
            'status' => 'Status',
        ];
    }
}
