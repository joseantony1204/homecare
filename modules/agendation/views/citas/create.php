<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */

$this->title = 'Creacion de Citas';
$this->params['breadcrumbs'][] = ['label' => 'Citas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
