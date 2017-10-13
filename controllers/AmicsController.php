<?php

namespace app\controllers;

use Yii;
use app\models\Amics;
use app\models\AmicsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\swiftmailer\Mailer;
use yii\swiftmailer;
// use yii\swiftmailer\Message;
use yii\mail\Message;

/**
 * AmicsController implements the CRUD actions for Amics model.
 */
class AmicsController extends Controller
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
     * Lists all Amics models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AmicsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Amics model.
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
     * Creates a new Amics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Amics();

        if ($model->load(Yii::$app->request->post())) {
            if (!empty($model->tipus)) {
                $model->adresa=$model->tipus.' '.$model->adresa;
            }
            // posar en majúscula els camps
            $model->cognoms=strtoupper($model->cognoms);
            $model->nom=strtoupper($model->nom);
            $model->poblacio=strtoupper($model->poblacio);
            $model->nif=strtoupper($model->nif);
            // desar les dades
            if ($model->save()){
                // if (!empty($model->mail)) {
                //     // enviar e-mail de benvinguda al desar
                // }
            }

            
            return $this->redirect(['view', 'id' => $model->numero]);
        }
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Amics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->numero]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Amics model.
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
     * Finds the Amics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Amics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Amics::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
