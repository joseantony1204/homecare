<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Afiliados */

$this->title = 'Actualizacion de Afiliados: ' . $model->AFIL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Afiliados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AFIL_ID, 'url' => ['view', 'id' => $model->AFIL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="afiliados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
