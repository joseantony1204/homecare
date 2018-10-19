<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */

$this->title = 'Creacion de Remisiones';
$this->params['breadcrumbs'][] = ['label' => 'Remisiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remisiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
