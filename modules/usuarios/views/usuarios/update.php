<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = 'Actualizacion de Usuarios: ' . $model->USUA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->USUA_ID, 'url' => ['view', 'id' => $model->USUA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
