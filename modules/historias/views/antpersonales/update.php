<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */

$this->title = 'Actualizacion de Antpersonales: ' . $model->ATAP_ID;
$this->params['breadcrumbs'][] = ['label' => 'Antpersonales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATAP_ID, 'url' => ['view', 'id' => $model->ATAP_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="antpersonales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
