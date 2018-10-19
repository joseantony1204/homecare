<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antpersonales */

$this->title = 'Creacion de Antpersonales';
$this->params['breadcrumbs'][] = ['label' => 'Antpersonales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antpersonales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
