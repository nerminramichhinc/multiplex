<?php

namespace backend\assets;
use yii\web\AssetBundle;

class ActorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/actor.css',
    ];
    public $js = [
    'js/actor.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
