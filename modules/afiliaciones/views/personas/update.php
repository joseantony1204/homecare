<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Personas */

$this->title = 'Actualizacion de Personas: ' . $model->PERS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PERS_ID, 'url' => ['view', 'id' => $model->PERS_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
