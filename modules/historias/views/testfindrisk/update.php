<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Testfindrisk */

$this->title = 'Actualizacion de Testfindrisk: ' . $model->ATTF_ID;
$this->params['breadcrumbs'][] = ['label' => 'Testfindrisks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATTF_ID, 'url' => ['view', 'id' => $model->ATTF_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="testfindrisk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
