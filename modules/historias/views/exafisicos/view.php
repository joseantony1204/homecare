<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */

$this->title = $model->ATEF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Exafisicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exafisicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATEF_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATEF_ID], [
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
            'ATEF_ID',
            'ATEF_ASPECTO:ntext',
            'ATEF_ESTADO:ntext',
            'ATEF_CABEZA:ntext',
            'ATEF_VISUAL:ntext',
            'ATEF_CUELLO:ntext',
            'ATEF_TORAX:ntext',
            'ATEF_ABDOMEN:ntext',
            'ATEF_GENITOURINARIO:ntext',
            'ATEF_OSTEOMUSCULAR:ntext',
            'ATEF_PIELYFANERAZ:ntext',
            'ATEF_NEUROLOGICO:ntext',
            'AGEN_ID',
            'ATEF_CREATEBY',
            'ATEF_UPDATEAT',
        ],
    ]) ?>

</div>
