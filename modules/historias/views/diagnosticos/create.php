<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Diagnosticos */

$this->title = 'Creacion de Diagnosticos';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosticos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
