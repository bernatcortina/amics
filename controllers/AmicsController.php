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
                if (!empty($model->mail)) {
                    // enviar e-mail de benvinguda al desar
                    self::correu($model->mail,$model->nom);
                }
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
    public function correu($desti,$nom)
    {
        Yii::$app->mailer->compose()
            ->setFrom('amics@ojc.cat')
            ->setTo($desti)
            ->setSubject('Benvingut/da a l\'OJC, '.$nom)
            ->setHtmlBody(
                '<html style="font-family: calibri, arial, verdana; font-size:17px;">
                    <img src="http://www.ojc.cat/cat/img/logo_cercles.png" height="70px" width="95px">
                        <br />
                    Benvolgut/da,
                        <br /><br />
                    Agraïm el vostre interès en fer-vos Amics de l\'Orquestra Simfònica Julià  Carbonell 
                    de les Terres de Lleida. En endavant rebreu informació sobre les activitats i tot allò 
                    referent a l\'Orquestra.
                        <br /><br />
                    També podeu seguir-nos a travès de les Xarxes Socials i la nostra pàgina web:
                        <br /><br />
                    <a href="http://facebook.com/ojclleida"><img src="http://www.ojc.cat/cat/img/facebook-ojc.jpg"></a>
                    <a href="http://twitter.com/OrquestraOJC"><img src="http://www.ojc.cat/cat/img/twitter-ojc.jpg"></a>
                    <a href="http://youtube.com/OSJuliaCarbonell"><img src="http://www.ojc.cat/cat/img/youtube-ojc.jpg"></a><br />
                    <a href="http://www.ojc.cat">www.ojc.cat</a><br />
                        <br />
                    Properament rebreu, per correu postal, el carnet que us acredita com a amics. 
                    Per qualsevol modificació en les vostres dades o suggeriment podeu dirigir-vos a aquesta 
                    adreça de correu.<br />
                        <br />
                    Aprofitem l\'avinentesa per a saludar-los molt cordialment,<br />
                        <br />
                    <img src="http://www.ojc.cat/cat/img/signatura.png" height="60px" width="340px">
                <html>')
            ->send();


        // $missatge = '
        //     <html style="font-family: calibri, arial, verdana; font-size:17px;">
        //         <img src="http://www.ojc.cat/cat/img/logo_cercles.png" height="70px" width="95px">
        //             <br />
        //         Benvolgut/da,
        //             <br /><br />
        //         Agraïm el vostre interès en fer-vos Amics de l\'Orquestra Simfònica Julià  Carbonell 
        //         de les Terres de Lleida. En endavant rebreu informació sobre les activitats i tot allò 
        //         referent a l\'Orquestra.
        //             <br /><br />
        //         També podeu seguir-nos a travès de les Xarxes Socials i la nostra pàgina web:
        //             <br /><br />
        //         <a href="http://facebook.com/ojclleida"><img src="http://www.ojc.cat/cat/img/facebook-ojc.jpg"></a>
        //         <a href="http://twitter.com/OrquestraOJC"><img src="http://www.ojc.cat/cat/img/twitter-ojc.jpg"></a>
        //         <a href="http://youtube.com/OSJuliaCarbonell"><img src="http://www.ojc.cat/cat/img/youtube-ojc.jpg"></a><br />
        //         <a href="http://www.ojc.cat">www.ojc.cat</a><br />
        //             <br />
        //         Properament rebreu, per correu postal, el carnet que us acredita com a amics. 
        //         Per qualsevol modificació en les vostres dades o suggeriment podeu dirigir-vos a aquesta 
        //         adreça de correu.<br />
        //             <br />
        //         Aprofitem l\'avinentesa per a saludar-los molt cordialment,<br />
        //             <br />
        //         <img src="http://www.ojc.cat/cat/img/signatura.png" height="60px" width="340px">
        //     <html>';
                    
        // $assumpte = 'Benvingut/da a l\'OJC, '.$nom;

        // $headers  = "MIME-Version: 1.0\n";
        // // $headers .= "Content-type: text/plain; charset=iso-8859-1\n";
        // $headers .= "Content-type: text/html; charset=UTF-8\n";
        // $headers .= "X-Priority: 3\n";
        // $headers .= "X-MSMail-Priority: Normal\n";
        // $headers .= "X-Mailer: php\n";
        // $headers .= "From: \"Amics OJC\" <amics@ojc.cat>\n";
        // return mail($desti, $assumpte, $missatge, $headers);
    }
}
