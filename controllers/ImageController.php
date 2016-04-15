<?php

namespace app\controllers;

use Yii;
use app\models\Image;
use app\models\Product;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * ImageController implements the CRUD actions for Image model.
 */
class ImageController extends BaseManageController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Image models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Image::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Image model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Image model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Image model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Image model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpload($type,$id){
        $result = array(
            "code" => 200,
            "msg"  => "",
            "data" => null
        );
        $model = new Image();

        $uploadModel = new UploadForm();

        if(!in_array($type,["product","user"])){
            echo json_encode(["code"=>400,"msg"=>'访问不正确','data'=>null]);
            exit;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Image::find()->where(['type'=>$type,'belongId'=>$id]),
        ]);

        $instanceModel = 'app\\models\\'.ucfirst(strtolower($type));
        $instance = $instanceModel::findOne($id);

        if(Yii::$app->request->isPost){
            $uploadModel->file = UploadedFile::getInstanceByName('file');

            if ($uploadModel->file && $uploadModel->validate()) {
                //$uploadModel->file->saveAs(Yii::$app->basePath.Yii::$app->params['upload.path'] . $uploadModel->file->baseName . '.' . $uploadModel->file->extension);
                $filename = Yii::$app->user->identity->id . '_' . time() . '.' . $uploadModel->file->extension;
                $uploadModel->file->saveAs($uploadModel->uploadPath . $filename);
                $model->name = $uploadModel->file->baseName;
                $model->url = $filename;
                $model->type = $type;
                $model->belongId = $id;
                if(!$model->save()){
                    $result["code"] = 500;
                    $result["msg"] = '保存数据出错：'.implode(';',$model->getErrors());
                }
            }else{
                $result["code"] = 400;
                $error = $uploadModel->getErrors();
                $result["msg"] = "图片不符合规定！".implode(';',$error['file']);
            }
            echo json_encode($result);
            exit;
            // id name type size file  lastModifiedDate
        }else{
            return $this->render("upload",[
                'instance' => $instance,
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Finds the Image model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Image the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
