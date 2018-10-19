<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Bancos */

$this->title = 'Actualizacion de Bancos: ' . $model->BANC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BANC_ID, 'url' => ['view', 'id' => $model->BANC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bancos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
