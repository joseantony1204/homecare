<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */

$this->title = $model->ATSV_ID;
$this->params['breadcrumbs'][] = ['label' => 'Signosvitales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signosvitales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATSV_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATSV_ID], [
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
            'ATSV_ID',
            'ATSV_PRESIONHH',
            'ATSV_PRESIONMM',
            'ATSV_PESO',
            'ATSV_TALLA',
            'ATSV_IMC',
            'ATSV_FRECUENCIAC',
            'ATSV_FRECUENCIAR',
            'ATSV_PERIMETROA',
            'ATSV_PERIMETROC',
            'ATSV_PERIMETROB',
            'ATSV_TEMPERATURA',
            'AGEN_ID',
            'ATSV_CREATEBY',
            'ATSV_UPDATEAT',
        ],
    ]) ?>

</div>
