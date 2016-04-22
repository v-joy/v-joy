<?php

namespace app\controllers;

use Yii;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;

class WechatController extends BaseFrontController
{
    public $enableCsrfValidation = false;
    protected $_app = null;

    public function init(){
        parent::init();
        $this->_app = new Application( Yii::$app->params['wechat']);
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
        $server = $this->_app->server;
        //$user   = $app->user;
        //$oauth  = $app->oauth;
        $server->setMessageHandler(function ($message) {
            $text = new Text(['content' => '您好～ 来看看我们的网站吧: http://hongyaowan.com   有什么建议可以给我发邮件呦~ nosql@icloud.com']);
            return $text;
        });

        $server->serve()->send();
        exit;
    }
}
