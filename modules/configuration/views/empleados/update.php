<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Empleados */

$this->title = 'Actualizacion de Empleados: ' . $model->EMPL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EMPL_ID, 'url' => ['view', 'id' => $model->EMPL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
