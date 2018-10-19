<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */

$this->title = $model->ATAG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Antginecologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antginecologicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATAG_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATAG_ID], [
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
            'ATAG_ID',
            'ATAG_MENARGUIA',
            'ATAG_CICLOS',
            'ATAG_FUM',
            'ATAG_GRAVIDA',
            'ATAG_PARTOS',
            'ATAG_ABORTO',
            'ATAG_CESARIA',
            'ATAG_LACTANDO',
            'ATAG_DISMINORREA',
            'ATAG_EPI',
            'ATAG_COMPANEROS',
            'ATAG_MASHIJOS',
            'ATAG_ENFESEXU',
            'ATAG_OTROS:ntext',
            'PERS_ID',
            'ATAG_CREATEBY',
            'ATAG_UPDATEAT',
        ],
    ]) ?>

</div>
