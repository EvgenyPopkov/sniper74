<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $layout = 'adminlayout';
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    return $this->redirect(['session/open']);
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            if (Yii::$app->session->get('open') === true) return true;
                            else return false;
                        }
                    ]
                ]
            ]
        ];
      }
    /*public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            return Yii::$app->user->identity->isAdmin;
                        }
                    ]
                ]
            ]
        ];
    }*/

    public function init()
    {
        parent::init();
    }
}
