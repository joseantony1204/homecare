<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recomendaciones */

$this->title = 'Creacion de Recomendaciones';
$this->params['breadcrumbs'][] = ['label' => 'Recomendaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recomendaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
