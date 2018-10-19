<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */

$this->title = 'Actualizacion de Generalidades: ' . $model->ATGE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Generalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATGE_ID, 'url' => ['view', 'id' => $model->ATGE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="generalidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
