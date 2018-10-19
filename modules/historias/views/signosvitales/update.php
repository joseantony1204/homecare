<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */

$this->title = 'Actualizacion de Signosvitales: ' . $model->ATSV_ID;
$this->params['breadcrumbs'][] = ['label' => 'Signosvitales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATSV_ID, 'url' => ['view', 'id' => $model->ATSV_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="signosvitales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
