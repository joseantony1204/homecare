<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Habitos */

$this->title = 'Creacion de Habitos';
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habitos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
