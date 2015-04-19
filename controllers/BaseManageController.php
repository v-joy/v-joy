<?php

namespace app\controllers;

use Yii;

class BaseManageController extends BaseController
{
    public $layout  = "manage";

    public function init(){
        parent::init();
        //check login
        if(Yii::$app->user->isGuest){
            $this->redirect(yii::$app->homeUrl.yii::$app->user->loginUrl[0],401);
        }
        $action = yii::$app->requestedRoute;
        if (! \Yii::$app->user->can($action)) {
            //mark todo
            echo "没有权限查看！";exit;
        }
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
