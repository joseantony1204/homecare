<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Generos */

$this->title = 'Actualizacion de Generos: ' . $model->TIGE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TIGE_ID, 'url' => ['view', 'id' => $model->TIGE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="generos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
