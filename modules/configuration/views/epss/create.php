<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */

$this->title = 'Creacion de Epss';
$this->params['breadcrumbs'][] = ['label' => 'Epsses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="epss-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
