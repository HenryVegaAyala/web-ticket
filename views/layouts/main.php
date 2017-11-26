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

    <?php echo Html::jsFile('@web/js/all.js?v=' . filemtime(Yii::getAlias('@webroot/js/all.js'))) ?>
    <?php $this->endBody() ?>
    <?php if (!Yii::$app->user->isGuest) { ?>
        <script type="text/javascript">var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement('script'), s0 = document.getElementsByTagName('script')[0]
                s1.async = true
                s1.src = 'https://embed.tawk.to/59a4ec2e4fe3a1168eada2d2/default'
                s1.charset = 'UTF-8'
                s1.setAttribute('crossorigin', '*')
                s0.parentNode.insertBefore(s1, s0)
            })()</script>
    <?php } ?>
    </body>
    </html>
<?php $this->endPage() ?>