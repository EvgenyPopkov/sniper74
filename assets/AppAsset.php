<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'font-awesome/css/font-awesome.min.css',
        'css/site.css',
    ];
    public $js = [
        'js/lazyload.js',
    ];
    public $jsOptions =[
        'position' => View::POS_BEGIN
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
