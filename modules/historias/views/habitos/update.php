<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */

$this->title = 'Actualizacion de Habitos: ' . $model->ATHA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATHA_ID, 'url' => ['view', 'id' => $model->ATHA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="habitos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
