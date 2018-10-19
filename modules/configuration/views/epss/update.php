<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */

$this->title = 'Actualizacion de Epss: ' . $model->EPSS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Epsses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->EPSS_ID, 'url' => ['view', 'id' => $model->EPSS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="epss-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
