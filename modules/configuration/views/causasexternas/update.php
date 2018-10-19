<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Causasexternas */

$this->title = 'Actualizacion de Causasexternas: ' . $model->CAEX_ID;
$this->params['breadcrumbs'][] = ['label' => 'Causasexternas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CAEX_ID, 'url' => ['view', 'id' => $model->CAEX_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="causasexternas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
