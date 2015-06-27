<?php

namespace app\controllers;

use app\models\Article;
use app\models\Product;
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
        "code"=>200,
        "data"=>[],
        "msg"=>"",
    ];

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    protected function ajax($data,$code,$msg){
        echo json_encode([
            "code"=>$code,
            "data"=>$data,
            "msg"=>$msg,
        ]);
    }

    protected function success($data){
        return $this->ajax($data,200,"");
    }

    protected function error($code,$msg){
        return $this->ajax([],$code,$msg);
    }

    public function actionProduct()
    {
        $product = Product::find()->where(["id" => $_GET["id"], "status" => 1])->one();
        $user = $product->user->getAttributes();
        $product = $product->getAttributes();
        $product['username'] = $user['username'];
        $product['email'] = $user['email'];
        $product['address'] = $user['address'];
        $product['phone'] = $user['phone'];
        if (empty($product)) {
            $this->error(404, "找不到对应的信息");
        } else {
            $this->success($product);
        }
    }

    public function actionProducts($category = 'all', $search = 'all')
    {
        $condition = ['status'=>1];
        if ('all' !== $category) {
            $condition['categoryId'] = $category;
        }
        if ('all' !== $search) {
            $condition['name'] = ['like', 'name', $search, false];
            $condition['description'] = ['like', 'description', $search, false];;
        }
        echo json_encode(Product::toArr(Product::find()->where($condition)->all()));
    }

    public function actionArticle()
    {
        $article = Article::find()->where(["id" => $_GET["id"], "status" => 1])->one();
        if (empty($article)) {
            $this->error(404, "找不到对应的信息");
        } else {
            $this->success($article->getAttributes());
        }
    }

}
