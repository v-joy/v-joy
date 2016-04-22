<?php

namespace app\controllers;

use Yii;

class WechatController extends BaseFrontController
{
    public $enableCsrfValidation = false;

    public function init(){
        parent::init();
    }
    public function behaviors()
    {
        return [
        ];
    }

    public function actions() {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        Wechat::Load()->run();
        exit;
    }
}
