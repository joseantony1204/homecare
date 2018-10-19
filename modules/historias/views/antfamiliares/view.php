<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antfamiliares */

$this->title = $model->ATAF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Antfamiliares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antfamiliares-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATAF_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATAF_ID], [
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
            'ATAF_ID',
            'ATAF_HIPERTENSION',
            'ATAF_DIABETES',
            'ATAF_CONVULSIVO',
            'ATAF_MALFORMACIONES',
            'ATAF_CANCER',
            'ATAF_OTROS:ntext',
            'PERS_ID',
            'ATAF_CREATEBY',
            'ATAF_UPDATEAT',
        ],
    ]) ?>

</div>
