<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Estractos */

$this->title = 'Creacion de Estractos';
$this->params['breadcrumbs'][] = ['label' => 'Estractos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estractos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
