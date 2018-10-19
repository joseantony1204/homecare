<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Medicamentos */

$this->title = $model->MEDI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Medicamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicamentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MEDI_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MEDI_ID], [
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
            'MEDI_ID',
            'MEDI_CODIGOATC',
            'MEDI_DESCRIPCIONATC',
            'MEDI_PRINCIPIOACTIVO',
            'MEDI_CONCENTRACION',
            'MEDI_FORMAFARMACEUTICA:ntext',
            'MEDI_ACLARACION:ntext',
            'MEDI_LISTA',
            'MEDI_VALOR',
            'MEDI_CREATEBY',
            'MEDI_UPDATEAT',
        ],
    ]) ?>

</div>
