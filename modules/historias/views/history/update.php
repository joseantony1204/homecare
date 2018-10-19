<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */

$this->title = 'Actualizacion de History: ' . $model->AGEN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AGEN_ID, 'url' => ['view', 'id' => $model->AGEN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
