<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasdiagnosticos */

$this->title = 'Actualizacion de Clasdiagnosticos: ' . $model->DIAG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Clasdiagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->DIAG_ID, 'url' => ['view', 'id' => $model->DIAG_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clasdiagnosticos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
