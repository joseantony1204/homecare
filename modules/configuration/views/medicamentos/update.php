<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Medicamentos */

$this->title = 'Actualizacion de Medicamentos: ' . $model->MEDI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MEDI_ID, 'url' => ['view', 'id' => $model->MEDI_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medicamentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
