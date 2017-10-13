<?php
use yii\helpers\Html;
use yii\helpers\BaseHtml;
use yii\helpers\Url;
use yii\helpers\BaseUrl;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\base\Application;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://www.ojc.cat/cat/img/logo_cercles.png" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img src= "http://www.ojc.cat/cat/img/logo_cercles.png" width="30">'.' OJC',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            if (Yii::$app->user->id=='102'){
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Inici', 'url' => ['/site/index']],
                        ['label' => 'Amics', 'url' => ['/amics/index']],

                    Yii::$app->user->isGuest ?
                        ['label' => 'Entra', 'url' => ['/site/login']] :
                        ['label' => 'Surt (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],

            ]);
            }
            else {
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => [
                        ['label' => 'Inici', 'url' => ['/site/index']],

                        Yii::$app->user->isGuest ?
                            ['label' => 'Entra', 'url' => ['/site/login']] :
                            ['label' => 'Surt (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post']
                            ],
                    ],
                ]);
            }
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left"><img src= "http://www.ojc.cat/cat/img/logo_cercles.png" width="30"> OJC - Tots els drets reservats - &copy; <?= date('Y') ?></p>
            <p class="pull-right">Desenvolupat per <a href="http://bernatcortina.cat" target="_blank" >Bernat Cortina</a></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
