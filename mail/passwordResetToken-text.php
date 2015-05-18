<?php
/**
 * Created by PhpStorm.
 * User: liujunling
 * Date: 15/5/18
 * Time: 下午10:12
 */

/* @var $this yii\web\View */
/* @var $user common\models\User */
$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/resetpassword', 'token' => $user->password_reset_token]);
?>
    您好 <?= $user->username ?>,

    点击如下的链接来重置密码:

<?= $resetLink ?>