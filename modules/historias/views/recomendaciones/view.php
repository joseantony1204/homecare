<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */

$this->title = $model->ATRE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Recomendaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recomendaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATRE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATRE_ID], [
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
            'ATRE_ID',
            'ATRE_RECOMENDACIONES:ntext',
            'AGEN_ID',
            'ATRE_CREATEBY',
            'ATRE_UPDATEAT',
        ],
    ]) ?>

</div>
