<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasdiagnosticos */

$this->title = 'Creacion de Clasdiagnosticos';
$this->params['breadcrumbs'][] = ['label' => 'Clasdiagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasdiagnosticos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
