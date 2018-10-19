<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */

$this->title = 'Actualizacion de Revsistemas: ' . $model->ATRS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Revsistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATRS_ID, 'url' => ['view', 'id' => $model->ATRS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revsistemas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
