<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */

$this->title = $model->ATAP_ID;
$this->params['breadcrumbs'][] = ['label' => 'Antpersonales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antpersonales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATAP_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATAP_ID], [
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
            'ATAP_ID',
            'ATAP_HIPERTENSION',
            'ATAP_DIABETES',
            'ATAP_ENETOMBOTICA',
            'ATAP_CONVULSIONES',
            'ATAP_VALVULOPATIAS',
            'ATAP_HEPATICA',
            'ATAP_CEFALEA',
            'ATAP_MAMARIA',
            'ATAP_OTROS:ntext',
            'PERS_ID',
            'ATAP_CREATEBY',
            'ATAP_UPDATEAT',
        ],
    ]) ?>

</div>
