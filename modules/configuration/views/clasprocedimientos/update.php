<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */

$this->title = 'Actualizacion de Clasprocedimientos: ' . $model->PROC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Clasprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PROC_ID, 'url' => ['view', 'id' => $model->PROC_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clasprocedimientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
