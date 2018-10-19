<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Servicios */

$this->title = 'Actualizacion de Servicios: ' . $model->FINA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FINA_ID, 'url' => ['view', 'id' => $model->FINA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
