<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Testfindrisk */

$this->title = $model->ATTF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Testfindrisks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testfindrisk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATTF_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATTF_ID], [
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
            'ATTF_ID',
            'ATTF_EDAD',
            'ATTF_EDADPNTS',
            'ATTF_PESO',
            'ATTF_TALLA',
            'ATTF_IMC',
            'ATTF_IMCTOTAL',
            'ATTF_IMCPNTS',
            'ATTF_PC',
            'ATTF_PCMUJERES',
            'ATTF_PCPNTS',
            'ATTF_ACTIVIDADFISICA',
            'ATTF_ACTIVIDADFISICAPNTS',
            'ATTF_CONSUMEVERDURAS',
            'ATTF_CONSUMEVERDURASPNTS',
            'ATTF_TOMAMEDICAMENTOS',
            'ATTF_TOMAMEDICAMENTOSPNTS',
            'ATTF_GLUCOSA',
            'ATTF_GLUCOSAPNTS',
            'ATTF_DIABETESPARIENTES',
            'ATTF_DIABETESPARIENTESPNTS',
            'ATTF_TOTALPNTS',
            'AGEN_ID',
            'ATTF_CREATEBY',
            'ATTF_UPDATEAT',
        ],
    ]) ?>

</div>
