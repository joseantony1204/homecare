<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Estractos */

$this->title = 'Actualizacion de Estractos: ' . $model->ESTR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Estractos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ESTR_ID, 'url' => ['view', 'id' => $model->ESTR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estractos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
