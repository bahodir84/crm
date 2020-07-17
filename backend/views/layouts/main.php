<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ADC database',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],

        ['label'=>'Others',
            'items'=>[
                ['label' => 'Users', 'url' => ['/user/index']],
                ['label' => 'Position', 'url' => ['/auth-assignment/index']],  
                ['label' => 'Salary management', 'url' => ['/teacherselect/index']],  
                //['label' => 'Staff', 'url' => ['/staffs/index']],
                ['label' => 'Expenditures', 'url' => ['/expenditures/index']],          

            ],

        ],



        ['label' => 'Subjects', 'url' => ['/subjects/index']],
        ['label' => 'Levels', 'url' => ['/levels/index']],
        ['label' => 'Teachers', 'url' => ['/teachers/index']],
        ['label' => 'Payment', 'url' => ['/payment/index']],
        ['label' => 'Salary', 'url' => ['/payment/allsalary']],

        ['label' => 'Front office', 
        'url' => '../../frontend/web/index.php?r=site%2Findex'
         ],


    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container" style="width:100%">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Andijan Development Center <?= date('Y') ?></p>

        <p class="pull-right">Developed by <a href="http://www.bahodir1984.com" target="_blank">Kodirov Bahodirjon</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
