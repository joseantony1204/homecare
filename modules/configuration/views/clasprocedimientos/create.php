<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */

$this->title = 'Creacion de Clasprocedimientos';
$this->params['breadcrumbs'][] = ['label' => 'Clasprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasprocedimientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
