<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Perfiles */

$this->title = $model->USPE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->USPE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->USPE_ID], [
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
            'USPE_ID',
            'USPE_NOMBRE',
            'USPE_FECHACAMBIO',
            'USPE_REGISTRADOPOR',
        ],
    ]) ?>

</div>
