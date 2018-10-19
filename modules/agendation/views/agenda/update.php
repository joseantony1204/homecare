<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Agenda */

$this->title = 'Actualizacion de Agenda: ' . $model->AGEN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Agendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AGEN_ID, 'url' => ['view', 'id' => $model->AGEN_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
