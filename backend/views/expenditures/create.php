<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Expenditures */

$this->title = 'Create Expenditures';
$this->params['breadcrumbs'][] = ['label' => 'Expenditures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expenditures-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
