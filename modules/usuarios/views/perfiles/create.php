<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\Perfiles */

$this->title = 'Creacion de Perfiles';
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
