<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Tiposidentificaciones */

$this->title = 'Creacion de Tiposidentificaciones';
$this->params['breadcrumbs'][] = ['label' => 'Tiposidentificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposidentificaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
