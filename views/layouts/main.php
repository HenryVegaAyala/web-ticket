<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Cache-control" content="public">
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <link rel="shortcut icon" href="<?php echo Yii::$app->getHomeUrl(); ?>favicon.ico"
              type="image/x-icon">
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title) ?></title>
        <?php echo Html::cssFile('@web/css/ticket.min.css?v=' . filemtime(Yii::getAlias('@webroot/css/ticket.min.css'))) ?>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <?php echo $content ?>

    <?php echo $this->render('footer') ?>
    <?php echo Html::jsFile('@web/js/all.js?v=' . filemtime(Yii::getAlias('@webroot/js/all.js'))) ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>