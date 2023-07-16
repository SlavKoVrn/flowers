<?php

namespace frontend\controllers;

use common\models\City;
use common\models\CityProduct;
use frontend\models\CityProductSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
    public function actionIndex($city_id)
    {
        $searchModel = new CityProductSearch();
        $searchModel->city = $city_id;
        $dataProvider = $searchModel->search($this->request->queryParams);
        $city_model = City::findOne($city_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'city_model' => $city_model,
        ]);
    }

    /**
     * Displays a single CityProduct model.
     * @param int $id Ид
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
     */

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
     * @param int $id Ид
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
     * @param int $id Ид
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
     * @param int $id Ид
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
