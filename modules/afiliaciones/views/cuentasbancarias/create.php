<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Cuentasbancarias */

$this->title = 'Creacion de Cuentasbancarias';
$this->params['breadcrumbs'][] = ['label' => 'Cuentasbancarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentasbancarias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
