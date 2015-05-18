<?php
/**
 * Created by PhpStorm.
 * User: liujunling
 * Date: 15/5/18
 * Time: 下午10:12
 */

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\User */
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/resetpassword', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>您好 <?= Html::encode($user->username) ?>,</p>

    <p>点击如下的链接来重置密码:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>