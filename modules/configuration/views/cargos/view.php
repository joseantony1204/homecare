<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Cargos */

$this->title = $model->CARG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CARG_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CARG_ID], [
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
            'CARG_ID',
            'CARG_NOMBRE',
            'CARG_FECHACAMBIO',
            'CARG_REGISTRADOPOR',
        ],
    ]) ?>

</div>
