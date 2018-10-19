<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */

$this->title = 'Actualizacion de Cuentasbancarias: ' . $model->FOPA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cuentasbancarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FOPA_ID, 'url' => ['view', 'id' => $model->FOPA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cuentasbancarias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
