<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Revsistemas */

$this->title = $model->ATRS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Revsistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revsistemas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATRS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATRS_ID], [
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
            'ATRS_ID',
            'ATRS_GENERAL:ntext',
            'ATRS_RESPIRATORIO:ntext',
            'ATRS_CARDIOVASCULAR:ntext',
            'ATRS_GASTROINTESTINAL:ntext',
            'ATRS_GENITOURINARIO:ntext',
            'ATRS_ENDOCRINO:ntext',
            'ATRS_NEUROLOGICO:ntext',
            'AGEN_ID',
            'ATRS_CREATEBY',
            'ATRS_UPDATEAT',
        ],
    ]) ?>

</div>
