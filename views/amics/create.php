<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Amics */

$this->title = 'Crear un nou Amic';
$this->params['breadcrumbs'][] = ['label' => 'Amics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amics-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <br />
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
