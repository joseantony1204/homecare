<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recetarios */

$this->title = 'Actualizacion de Recetarios: ' . $model->ATRE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Recetarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATRE_ID, 'url' => ['view', 'id' => $model->ATRE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recetarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
