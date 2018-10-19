<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */

$this->title = 'Creacion de Generalidades';
$this->params['breadcrumbs'][] = ['label' => 'Generalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
