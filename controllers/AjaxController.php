<?php

namespace app\controllers;

use app\models\Article;
use app\models\Product;
use app\models\Ranklist;
use Yii;

class AjaxController extends BaseFrontController
{
    public function behaviors()
    {
        return [
        ];
    }

    //mark not in use
    protected $result = [
        'code'=>200,
        'data'=>[],
        'msg'=>'',
    ];

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    protected function ajax($data,$code,$msg) {
        echo json_encode([
            'code'=>$code,
            'data'=>$data,
            'msg'=>$msg,
        ]);
    }

    protected function success($data) {
        return $this->ajax($data,200,'');
    }

    protected function error($code,$msg) {
        return $this->ajax([],$code,$msg);
    }

    public function actionProduct()
    {
        $product = Product::find()->where(['id' => $_GET['id'], 'status' => 1])->one()->format();
        if (empty($product)) {
            $this->error(404, '找不到对应的信息');
        } else {
            $this->success($product);
        }
    }

    public function actionProducts($category = 'all', $search = 'all') {
        $condition = ['status'=>1];
        if ('all' !== $category) {
            $condition['categoryId'] = $category;
        }
        if ('all' !== $search) {
            // mark todo: 这里应该
            $condition['name'] = ['like', 'name', $search];
        }
        $this->success(Product::toArr(Product::find()->where($condition)->all()));
    }

    public function actionArticle($id) {
        $article = Article::find()->where(['id' => $id, 'status' => 1])->one();
        if (empty($article)) {
            $this->error(404, '找不到对应的信息');
        } else {
            $this->success($article->getAttributes());
        }
    }

    public function actionRanklist($id = null) {
        $ranklist = [];
        if ($id === null) {
            $ranklist = Ranklist::find()->where(['status' => 1])->orderby('id desc')->one()->format();
        } else {
            $ranklist = Ranklist::find()->where(['id' => $id, 'status' => 1])->one()->format();
        }
        if (!empty($ranklist)) {
            $this->success($ranklist);
        } else {
            $this->error(404, '找不到对应的排行榜');
        }
    }

}
