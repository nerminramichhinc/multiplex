<?php

namespace backend\assets;
use yii\web\AssetBundle;

class DiscountAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/discount.css',
    ];
    public $js = [
    'js/discount.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
