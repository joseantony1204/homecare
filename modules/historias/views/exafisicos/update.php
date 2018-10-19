<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */

$this->title = 'Actualizacion de Exafisicos: ' . $model->ATEF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Exafisicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATEF_ID, 'url' => ['view', 'id' => $model->ATEF_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exafisicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
