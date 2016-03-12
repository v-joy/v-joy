<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Image */
$this->title = '上传图片至 ' . $instance::tableName();
$this->params['breadcrumbs'][] = ['label' => '图片', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label'=> '返回主列表', 'url' => '/'.$_GET['type'].'/index' ];
$this->params['breadcrumbs'][] = ['label'=> '返回刚创建的数据', 'url' => '/'.$_GET['type'].'/view/'.$_GET['id'] ];
$this->registerJsFile($baseUrl."/upload/js/webuploader.html5only.min.js",['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile($baseUrl."/upload/js/diyUpload.js",['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerCssFile($baseUrl."/upload/css/webuploader.css");
$this->registerCssFile($baseUrl."/upload/css/diyUpload.css");
?>
<div class="image-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="demo">
        <div id="uploadDiv" ></div>
    </div>

</div>
<script type="text/javascript">
    var uploadOption = {
        url:'<?= Yii::$app->request->url ?>',
        success:function( data ) {
            if(data.code != 200){
                alert(data.msg);
            }
        },
        error:function( err ) {
            alert(err);
        },
        buttonText : '选择文件',
        //chunked:true,
        chunked:false,
        // 分片大小
        //chunkSize:512 * 1024,
        //最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
        fileNumLimit:5,
        fileSizeLimit:500000 * 1024,
        fileSingleSizeLimit:50000 * 1024,
        accept: {
            title:"Images",
            extensions:"jpg,jpeg,bmp,png",
            mimeTypes:"image/*"
        }
    }
</script>
