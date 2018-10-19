<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Exafisicos */

$this->title = 'Creacion de Exafisicos';
$this->params['breadcrumbs'][] = ['label' => 'Exafisicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exafisicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
