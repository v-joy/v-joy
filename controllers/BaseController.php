<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class BaseController extends Controller
{
    //public $layout  = false;

    protected $_viewVars = [
    ];

    public function behaviors()
    {
        return [
        ];
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function Render($view,$data=[]){

        $this->_viewVars['baseUrl'] = Yii::getAlias('@web');
        $this->_viewVars['HOST'] = $_SERVER['HTTP_HOST'];
        return parent::Render($view,array_merge($this->_viewVars,$data));
    }


}
