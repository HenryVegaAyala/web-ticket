<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?php echo Yii::$app->language ?>">
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo Html::csrfMetaTags() ?>
        <title><?php echo Html::encode($this->title) ?></title>
        <?php echo Html::cssFile('@web/css/ticket.min.css?v=' . filemtime(Yii::getAlias('@webroot/css/ticket.min.css'))) ?>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <?php echo Alert::widget() ?>
    <?php echo $content ?>

    <?php echo Html::jsFile('@web/js/all.js?v=' . filemtime(Yii::getAlias('@webroot/js/all.js'))) ?>
    <?php $this->endBody() ?>
    <?php if (Yii::$app->user->isGuest) { ?>
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement('script'), s0 = document.getElementsByTagName('script')[0]
                s1.async = true
                s1.src = 'https://embed.tawk.to/59dd7cb2c28eca75e4625528/default?v=1507494478'
                s1.charset = 'UTF-8'
                s1.setAttribute('crossorigin', '*')
                s0.parentNode.insertBefore(s1, s0)
            })()
        </script>
    <?php } ?>
    </body>
    </html>
<?php $this->endPage() ?>