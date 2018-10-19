<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\History */

$this->title = $model->AGEN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->AGEN_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->AGEN_ID], [
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
            'AGEN_ID',
            'AGEN_FECHAPROCESO',
            'AGEN_FECHA',
            'AGEN_HORAINICIO',
            'AGEN_HORAFINAL',
            'FINA_ID',
            'PERS_ID',
            'PEEM_ID',
            'ESCI_ID',
            'AGEN_CREATEBY',
            'AGEN_UPDATEAT',
        ],
    ]) ?>

</div>
