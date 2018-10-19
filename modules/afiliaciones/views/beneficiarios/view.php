<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Beneficiarios */

$this->title = $model->BENE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Beneficiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="beneficiarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->BENE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->BENE_ID], [
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
            'BENE_ID',
            'BENE_PRIMERNOMBRE',
            'BENE_SEGUNDONOMBRE',
            'BENE_PRIMERAPELLIDO',
            'BENE_SEGUNDOAPELLIDO',
            'BENE_FECHAINGRESO',
            'PERS_ID',
            'AFIL_ID',
            'BENE_CREATEBY',
            'BENE_UPDATEAT',
        ],
    ]) ?>

</div>
