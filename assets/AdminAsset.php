<?php namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{

    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/AdminLTE.css'
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];

}
