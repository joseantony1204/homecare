<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Perfiles */

$this->title = 'Actualizacion de Perfiles: ' . $model->USPE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->USPE_ID, 'url' => ['view', 'id' => $model->USPE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfiles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
