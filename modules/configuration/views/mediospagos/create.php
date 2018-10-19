<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Mediospagos */

$this->title = 'Creacion de Mediospagos';
$this->params['breadcrumbs'][] = ['label' => 'Mediospagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mediospagos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
