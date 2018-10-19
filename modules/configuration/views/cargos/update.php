<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Cargos */

$this->title = 'Actualizacion de Cargos: ' . $model->CARG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CARG_ID, 'url' => ['view', 'id' => $model->CARG_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
