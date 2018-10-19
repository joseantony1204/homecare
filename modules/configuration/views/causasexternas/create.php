<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Causasexternas */

$this->title = 'Creacion de Causasexternas';
$this->params['breadcrumbs'][] = ['label' => 'Causasexternas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="causasexternas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
