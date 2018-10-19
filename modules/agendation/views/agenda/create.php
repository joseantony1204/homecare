<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Agenda */

$this->title = 'Creacion de Agenda';
$this->params['breadcrumbs'][] = ['label' => 'Agendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
