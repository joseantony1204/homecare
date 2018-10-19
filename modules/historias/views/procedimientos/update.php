<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */

$this->title = 'Actualizacion de Procedimientos: ' . $model->ATPR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATPR_ID, 'url' => ['view', 'id' => $model->ATPR_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="procedimientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
