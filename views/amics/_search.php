<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AmicsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'cognoms') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'adresa') ?>

    <?= $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'poblacio') ?>

    <?php // echo $form->field($model, 'comarca') ?>

    <?php // echo $form->field($model, 'telefon') ?>

    <?php // echo $form->field($model, 'telefon_mobil') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'nif') ?>

    <?php // echo $form->field($model, 'data_naix') ?>

    <?php // echo $form->field($model, 'data_proc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
