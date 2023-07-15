<?php

namespace backend\controllers;

use common\models\CityProduct;
use common\models\CityProductSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CityProductController implements the CRUD actions for CityProduct model.
 */
class CityProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all CityProduct models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CityProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CityProduct model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionValidate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new CityProduct();
        $model->load(Yii::$app->request->post());
        return ActiveForm::validate($model);
    }

    public function actionCreate()
    {
        if (Yii::$app->request->isGet){
            $get = Yii::$app->request->get();
            $model = CityProduct::find()->where([
                'city_id' => $get['city_id'],
                'product_id' => $get['product_id'],
            ])->one();
            if (!$model){
                $model = new CityProduct();
                $model->city_id = $get['city_id'];
                $model->product_id = $get['product_id'];
            }
            return $this->renderAjax('_form', [
                'model' => $model,
            ]);
        }

        if (Yii::$app->request->isPost){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            $model = CityProduct::find()->where([
                'city_id' => $post['CityProduct']['city_id'],
                'product_id' => $post['CityProduct']['product_id'],
            ])->one();
            if (!$model){
                $model = new CityProduct();
            }
            if ($model->load($post) and $model->save()) {
                return ['success'=>'true'];
            } else {
                return ActiveForm::validate($model);
            }
        }
    }

    /**
     * Creates a new CityProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
    public function actionCreate()
    {
        $model = new CityProduct();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
     */

    /**
     * Updates an existing CityProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
     */

    /**
     * Deletes an existing CityProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
     */

    /**
     * Finds the CityProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CityProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CityProduct::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
