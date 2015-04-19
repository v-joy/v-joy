<?php

namespace app\controllers;

use Yii;

class BaseManageController extends BaseController
{
    public $layout  = "manage";

    public function init(){
        parent::init();
        //check login
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
