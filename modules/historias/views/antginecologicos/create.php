<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Antginecologicos */

$this->title = 'Creacion de Antginecologicos';
$this->params['breadcrumbs'][] = ['label' => 'Antginecologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antginecologicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
