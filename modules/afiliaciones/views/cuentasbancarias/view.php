<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */

$this->title = $model->FOPA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cuentasbancarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentasbancarias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->FOPA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->FOPA_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'FOPA_ID',
            'FOPA_NUMEROCUENTA',
            'FOPA_NUMEROSEGURIDAD',
            'FOPA_FECHAVENCIMIENTO',
            'FOPA_ACTUAL',
            'BANC_ID',
            'TICU_ID',
            'PEPA_ID',
            'AFIL_ID',
            'FOPA_CREATEBY',
            'FOMA_UPDATEAT',
        ],
    ]) ?>

</div>
