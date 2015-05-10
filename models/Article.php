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
            [['title', 'content',  'categoryId'], 'required'],
            [['id',  'categoryId', 'status'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 128]
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'userId']);
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'categoryId']);
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
