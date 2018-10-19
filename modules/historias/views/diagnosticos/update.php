<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */

$this->title = 'Actualizacion de Diagnosticos: ' . $model->ATDI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATDI_ID, 'url' => ['view', 'id' => $model->ATDI_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnosticos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
