<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Recetarios */

$this->title = 'Creacion de Recetarios';
$this->params['breadcrumbs'][] = ['label' => 'Recetarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
