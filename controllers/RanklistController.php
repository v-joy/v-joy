<?php

namespace app\controllers;

use Yii;
use app\models\Ranklist;
use app\models\Rankitem;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RanklistController implements the CRUD actions for Ranklist model.
 */
class RanklistController extends BaseManageController
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
     * Lists all Ranklist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = "";
        if(isset($_GET["userid"])){
            $query = Ranklist::find()->where(["userId"=>intval($_GET["userid"])]);
        }else{
            $query = Ranklist::find();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ranklist model.
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
     * Creates a new Ranklist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ranklist();
        $items= [];
        $formItems = Yii::$app->request->post('Rankitems', []);
        foreach ($formItems as $i => $formItem) {
            $modelItem = new Rankitem(['scenario' => Rankitem::SCENARIO_BATCH_UPDATE]);
            $modelItem->setAttributes($formItem);
            $items[] = $modelItem;
        }
        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $items[] = new Rankitem(['scenario' => Rankitem::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                'model' => $model,
                'items' => $items
            ]);
        }
        if ($model->load(Yii::$app->request->post())) {
            if (Model::validateMultiple($items) && $model->validate()) {
                $model->save();
                foreach($items as $modelItem) {
                    $modelItem->rank_id = $model->id;
                    $modelItem->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
var_dump($items);
        return $this->render('create', [
            'model' => $model,
            'items' => $items
        ]);
    }

    /**
     * Updates an existing Ranklist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('modifyOwn', ['model' => $model])) {
            //echo 'yes';exit;
            //mark
        }else{
            //echo 'no';exit;
        }

        $model = $this->findModel($id);
        $items = $model->rankitems;
        $formItems = Yii::$app->request->post('Rankitem', []);
        foreach ($formItems as $i => $formItem) {
            //loading the models if they are not new
            if (isset($formItem['id']) && isset($formItem['updateType']) && $formItem['updateType'] != Rankitem::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelItem = Rankitem::fiadOne(['id' => $formItem['id'], 'rankId' => $model->id]);
                $modelItem->setScenario(Rankitem::SCENARIO_BATCH_UPDATE);
                $modelItem->setAttributes($formItem);
                $items[$i] = $modelItem;
                //validate here if the modelItem loaded is valid, and if it can be updated or deleted
            } else {
                $modelItem = new Rankitem(['scenario' => Rankitem::SCENARIO_BATCH_UPDATE]);
                $modelItem->setAttributes($formItem);
                $items[] = $modelItem;
            }
        }
        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $items[] = new Rankitem(['scenario' => Rankitem::SCENARIO_BATCH_UPDATE]);
            return $this->render('update', [
                'items' => $items,
                'model' => $model,
            ]);
        }
        if ($model->load(Yii::$app->request->post())) {
            if (Model::validateMultiple($items) && $model->validate()) {
                $model->save();
                foreach($items as $modelItem) {
                    //details that has been flagged for deletion will be deleted
                    if ($modelItem->updateType == Rankitem::UPDATE_TYPE_DELETE) {
                        $modelItem->delete();
                    } else {
                        //new or updated records go here
                        $modelItem->rankId = $model->id;
                        $modelItem->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'items' => $items,
            'model' => $model,
        ]);

    }

    /**
     * Deletes an existing Ranklist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ranklist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ranklist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ranklist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
