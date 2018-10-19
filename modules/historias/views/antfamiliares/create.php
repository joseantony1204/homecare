<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antfamiliares */

$this->title = 'Creacion de Antfamiliares';
$this->params['breadcrumbs'][] = ['label' => 'Antfamiliares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antfamiliares-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
