<?php

namespace backend\assets;
use yii\web\AssetBundle;

class MovieAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/movie.css',
    ];
    public $js = [
    'js/movie.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
