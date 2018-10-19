<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Causasexternas */

$this->title = $model->CAEX_ID;
$this->params['breadcrumbs'][] = ['label' => 'Causasexternas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="causasexternas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CAEX_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CAEX_ID], [
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
            'CAEX_ID',
            'CAEX_NOMBRE',
            'CAEX_CODIGO',
            'CAEX_CREATEBY',
            'CAEX_UPDATEAT',
        ],
    ]) ?>

</div>
