<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */

$this->title = $model->ATHA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habitos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATHA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATHA_ID], [
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
            'ATHA_ID',
            'ATHA_ALCOHOL',
            'ATHA_CIGARRILLO',
            'ATHA_DROGAS',
            'ATHA_OTROS:ntext',
            'PERS_ID',
            'ATHA_CREATEBY',
            'ATHA_UPDATEAT',
        ],
    ]) ?>

</div>
