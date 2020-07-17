<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Teacherselect */

$this->title = 'Create Teacherselect';
$this->params['breadcrumbs'][] = ['label' => 'Teacherselects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacherselect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
