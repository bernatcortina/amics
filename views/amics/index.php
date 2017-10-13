<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AmicsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Amics de l\'OJC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amics-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Afegir un amic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'numero',
            'cognoms',
            'nom',
            //'adresa',
            //'cp',
             'poblacio',
            // 'comarca',
            // 'telefon',
             'telefon_mobil',
             'mail',
            // 'nif',
             'data_naix',
            // 'data_proc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
