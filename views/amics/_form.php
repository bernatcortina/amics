<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Amics */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="amics-form">
    
    <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]); ?>
        
        <?= $form->field($model, 'cognoms')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'nom')->textInput(['maxlength' => 1100]) ?>
        <?= $form->field($model,'data_naix')->widget(DatePicker::classname(),[
                'name' => 'data_naix',
                'options' => [
                    'readonly' => true
                ],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy/mm/dd'
                ]
            ]);
        ?>
        <?= $form->field($model, 'nif')->textInput(['maxlength' => 9]) ?>
        <?= $form->field($model, 'tipus')->widget(Select2::classname(), [
                'data'=> [
                    'Av.' => 'Avinguda', 
                    'Bda.' => 'Baixada',
                    'Cant.' => 'Cantonada',
                    'C/' => 'Carrer',
                    'Crta.' => 'Carretera',
                    'Drec.' => 'Drecera',
                    'Ptge.' => 'Passatge',
                    'Pg.' => 'Passeig',
                    'Pl.' => 'Plaça',
                    'Pcta.' => 'Placeta',
                    'Pol.' => 'Polígon',
                    'Pda.' => 'Pujada',
                    'Rbla.' => 'Rambla',
                    'Trav.' => 'Travessera',
                    'Trv.' => 'Travessia',
                    'Urb.' => 'Urbanització',
                ],
                'options' => [
                    'placeholder' => 'Típus de via...',
                ],
            ]);
        ?>
        <?= $form->field($model, 'adresa')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'poblacio')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'cp')->textInput(['maxlength' => 10]) ?>
        <?= $form->field($model, 'comarca')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'mail')->textInput(['maxlength' => 100]) ?>
        <?= $form->field($model, 'telefon_mobil')->textInput(['maxlength' => 9]) ?>
        <?= $form->field($model, 'telefon')->textInput(['maxlength' => 9]) ?>
        <?= $form->field($model,'data_proc')->widget(DatePicker::classname(),[
                'name' => 'data_proc',
                'options' => [
                    'readonly' => true
                ],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy/mm/dd'
                ]
            ]);
        ?>
        <?= $form->field($model, 'registre')->widget(Select2::classname(), [
                'data'=> [
                    'CONCERT' => 'CONCERT',
                    'CORREU' => 'CORREU', 
                    'WEB' => 'WEB',
                ],
                'options' => [
                    'placeholder' => 'Procedència amic...',
                ],
            ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualitzar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
