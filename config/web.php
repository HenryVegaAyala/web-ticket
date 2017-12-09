﻿<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'assetManager' => [
            'linkAssets' => true,
            'appendTimestamp' => true,
            'converter' => [
                'class' => 'yii\web\AssetConverter',
                'commands' => [
                    'less' => ['css', 'lessc {from} {to} --no-color'],
                    'ts' => ['js', 'tsc --out {to} {from}'],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dca1t-E3Qw-YCl_sPf9FzyXsRlDrVvHy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'America/Lima',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
            'enableSession' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            //'class' => 'yii\web\UrlManager',
            //'baseUrl' => '/',
            //'enablePrettyUrl' => true,
            //'showScriptName' => false,
            //'enableStrictParsing' => true,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [

                /**Sesion**/
                '/login' => 'site/login',
                '/logout/<id:\d+>' => '/site/logout',

                /**home**/
                '/' => 'site/index',

                /**Cliente**/
                '/cliente-nuevo' => '/cliente/create',
                '/lista-cliente' => '/cliente/index',
                '/importar-cliente' => '/cliente/import',
                '/exportar-cliente' => '/cliente/export',
                '/actualizar-cliente/<id:\d+>' => '/cliente/update',
                '/ver-cliente/<id:\d+>' => '/cliente/view',
                '/eliminar-cliente/<id:\d+>' => '/cliente/delete',

                /**Usuario**/
                '/nuevo-usuario' => '/user/create',
                '/lista-usuario' => '/user/index',
                '/actualizar-usuario/<id:\d+>' => '/user/update',
                '/exportar-analistas' => '/user/export',
                '/inactivar/<id:\d+>' => '/user/status',
                '/eliminar-usuario/<id:\d+>' => '/user/delete',
                '/mi-cuenta/<id:\d+>' => '/user/change',

                /**Indicencia**/
                '/nueva-incidencia' => '/incidencia/create',
                '/lista-incidencia' => '/incidencia/index',
                '/actualizar-incidencia/<id:\d+>' => '/incidencia/update',
                '/eliminar-incidencia/<id:\d+>' => '/incidencia/delete',

                /**Proveedor**/
                '/nuevo-proveedor' => '/cliente/personal',
                '/actualizar-proveedor/<id:\d+>' => '/cliente/personalu',
                '/lista-proveedor' => '/cliente/index',
                '/ver-proveedor/<id:\d+>' => '/cliente/personalview',
                '/exportar-proveedor' => '/cliente/proveedor',
            ],
        ],

    ],
    'as beforeRequest' => [
        'class' => 'yii\filters\AccessControl',
        'rules' => [
            [
                'allow' => true,
                'actions' => ['login', 'forgot'],
            ],
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
        'denyCallback' => function () {
            return Yii::$app->response->redirect(['site/login']);
        },
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
