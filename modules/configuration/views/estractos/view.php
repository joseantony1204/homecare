<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Estractos */

$this->title = $model->ESTR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Estractos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estractos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ESTR_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ESTR_ID], [
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
            'ESTR_ID',
            'ESTR_NOMBRE',
            'ESTR_CREATEBY',
            'ESTR_UPDATEAT',
        ],
    ]) ?>

</div>
