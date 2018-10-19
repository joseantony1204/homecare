<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = $model->USUA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->USUA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->USUA_ID], [
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
            'USUA_ID',
            'USUA_USUARIO',
            'USUA_CLAVE:ntext',
            'USUA_SESSION:ntext',
            'USUA_FECHAALTA',
            'USUA_FECHABAJA',
            'USUA_ULTIMOACCESO',
            'USUA_NUMINTENTOS',
            'USES_ID',
            'PERS_ID',
            'USPE_ID',
            'USUA_FECHACAMBIO',
            'USUA_REGISTRADOPOR',
        ],
    ]) ?>

</div>
