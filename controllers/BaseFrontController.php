<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\Category;

class BaseFrontController extends BaseController
{
    //public $layout  = false;

    public function init(){
        parent::init();
        $this->_viewVars["p_cates"] = Category::find()->where(["type"=>"product"])->orderBy("weight desc")->all();
        $a_cates = Category::find()->where(["type"=>"article"])->orderBy("weight desc")->all();
        $a_catesArray = [];
        foreach($a_cates as $key=>$cate){
            $cateArray = $cate->getAttributes();
            $cateArray["articles"] = Article::find()->where(["categoryId"=>$cateArray["id"],"status"=>1])->select(["id","title"])->all();
            $a_catesArray[] = $cateArray;
        }
        $this->_viewVars["a_cates"] = $a_catesArray;
        //var_dump($a_catesArray[0]["articles"][0]->getAttributes());exit;
    }
    public function behaviors()
    {
        return [
        ];
    }

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

}
