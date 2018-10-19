<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */

$this->title = 'Actualizacion de Beneficiarios: ' . $model->BENE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Beneficiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->BENE_ID, 'url' => ['view', 'id' => $model->BENE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="beneficiarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
