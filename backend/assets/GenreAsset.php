<?php

namespace backend\assets;
use yii\web\AssetBundle;

class GenreAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/genre.css',
    ];
    public $js = [
    'js/genre.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
