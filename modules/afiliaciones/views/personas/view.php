<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Personas */

$this->title = $model->PERS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PERS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PERS_ID], [
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
            'PERS_ID',
            'PERS_IDENTIFICACION',
            'PERS_FECHANACIMIENTO',
            'PERS_DIRECCION',
            'PERS_TELEFONO',
            'PERS_SENDSMS',
            'PERS_EMAIL:ntext',
            'PERS_SENDMAIL',
            'PERS_PATHIMG:ntext',
            'ESCI_ID',
            'TIID_ID',
            'TIGE_ID',
            'PAIS_ID',
            'DEPA_ID',
            'MUNI_ID',
            'PERS_CREATEBY',
            'PERS_UPDATEAT',
        ],
    ]) ?>

</div>
