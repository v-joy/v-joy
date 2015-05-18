<?php
/**
 * Created by PhpStorm.
 * User: liujunling
 * Date: 15/5/18
 * Time: 下午10:13
 */

use yii\helpers\Html;
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>
<?php $this->endPage() ?>