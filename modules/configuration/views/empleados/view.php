<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Empleados */

$this->title = $model->EMPL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->EMPL_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->EMPL_ID], [
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
            'EMPL_ID',
            'EMPL_FECHAINGRESO',
            'PERS_ID',
            'CARG_ID',
            'ESTA_ID',
            'EMPL_CREATEBY',
            'EMPL_UPDATEAT',
        ],
    ]) ?>

</div>
