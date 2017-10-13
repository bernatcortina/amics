<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Amics */

$this->title = $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Amics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amics-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualitzar', ['update', 'id' => $model->numero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->numero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Segur que vols eliminar aquest element?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'numero',
            'cognoms',
            'nom',
            'adresa',
            'cp',
            'poblacio',
            'comarca',
            'telefon',
            'telefon_mobil',
            'mail',
            'nif',
            'data_naix',
            'data_proc',
            'registre',
        ],
    ]) ?>

</div>
