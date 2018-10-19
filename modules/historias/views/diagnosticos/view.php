<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */

$this->title = $model->ATDI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosticos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATDI_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATDI_ID], [
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
            'ATDI_ID',
            'ATDI_RIESGOVICTIMA',
            'ATDI_RIESGOVICTIMAVIO',
            'DIAG_ID',
            'CLDI_ID',
            'TIDI_ID',
            'AGEN_ID',
            'ATDI_CREATEBY',
            'ATDI_UPDATEAT',
        ],
    ]) ?>

</div>
