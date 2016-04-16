<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class UploadForm extends Model
{

    public $file;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    public function getUploadPath(){
        return Yii::$app->basePath. '/front' .Yii::$app->params['upload.path'];
    }

}
