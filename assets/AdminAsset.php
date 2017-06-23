<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'font-awesome/css/font-awesome.min.css',
        'summernote-master/dist/summernote.css',
        'css/admin.css',
    ];
    public $js = [
        'js/lazyload.js',
        'summernote-master/dist/summernote.min.js',
        'js/edit.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
