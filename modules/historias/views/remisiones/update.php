<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */

$this->title = 'Actualizacion de Remisiones: ' . $model->ATRM_ID;
$this->params['breadcrumbs'][] = ['label' => 'Remisiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATRM_ID, 'url' => ['view', 'id' => $model->ATRM_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="remisiones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
