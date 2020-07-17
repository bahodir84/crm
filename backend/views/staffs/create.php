<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Staffs */

$this->title = 'Create Staffs';
$this->params['breadcrumbs'][] = ['label' => 'Staffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
