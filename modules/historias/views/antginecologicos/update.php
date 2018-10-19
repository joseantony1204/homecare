<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */

$this->title = 'Actualizacion de Antginecologicos: ' . $model->ATAG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Antginecologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATAG_ID, 'url' => ['view', 'id' => $model->ATAG_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="antginecologicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
