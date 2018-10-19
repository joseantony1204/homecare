<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */

$this->title = 'Actualizacion de Recomendaciones: ' . $model->ATRE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Recomendaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATRE_ID, 'url' => ['view', 'id' => $model->ATRE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recomendaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
