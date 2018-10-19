<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */

$this->title = 'Actualizacion de Pagos: ' . $model->PAGO_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PAGO_ID, 'url' => ['view', 'id' => $model->PAGO_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
