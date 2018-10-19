<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Signosvitales */

$this->title = 'Creacion de Signosvitales';
$this->params['breadcrumbs'][] = ['label' => 'Signosvitales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signosvitales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
