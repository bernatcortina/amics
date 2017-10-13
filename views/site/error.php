<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Alguna cosa ha anat malament.
    </p>
    <p>
        Si l'error no desapareix, si us plau contacta amb l'administrador del lloc. Gràcies.
    </p>

</div>
