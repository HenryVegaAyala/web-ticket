<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'repository/bootstrap/dist/css/bootstrap.min.css',
        'repository/font-awesome/css/font-awesome.min.css',
        'css/custom.scss',
    ];
    public $js = [
        'js/agenda.min.js',
        'repository/bootstrap/dist/js/bootstrap.min.js',
        'js/custom.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
