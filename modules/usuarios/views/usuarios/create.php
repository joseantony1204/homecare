<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Usuarios */

$this->title = 'Creacion de Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
