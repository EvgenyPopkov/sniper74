<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\TaskProgram;
use app\models\TaskProgramSearch;
use app\models\Program;
use app\models\Task;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class TaskprogramController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new TaskProgramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($idTask, $idProgram)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTask, $idProgram),
        ]);
    }

    public function actionCreate()
    {
        $model = new TaskProgram();
        $programs = ArrayHelper::map(Program::find()->all(), 'id', 'name');
        $tasks = ArrayHelper::map(Task::find()->all(), 'id', 'name');

        if(Yii::$app->request->isPost) {
          $program = Yii::$app->request->post('program');
          $task = Yii::$app->request->post('task');

          if (!TaskProgram::getRepeat($task, $program)){
            $model->idProgram = $program;
            $model->idTask = $task;

            if ($model->save() && $this->SetProgramTask($task,$program)) {
                return $this->redirect(['view', 'idTask' => $task, 'idProgram' => $program]);
            }
          }
        }

        return $this->render('create', [
            'model' => $model,
            'programs'=>$programs,
            'tasks' => $tasks
        ]);
    }

    public function actionUpdate($idTask, $idProgram)
    {
        $model = $this->findModel($idTask, $idProgram);
        $programs = ArrayHelper::map(Program::find()->all(), 'id', 'name');
        $tasks = ArrayHelper::map(Task::find()->all(), 'id', 'name');
        $programId = $model->program->id;
        $taskId = $model->task->id;

        if(Yii::$app->request->isPost) {
          $program = Yii::$app->request->post('program');
          $task = Yii::$app->request->post('task');

          if (!TaskProgram::getRepeat($task, $program)){
            $model->idProgram = $program;
            $model->idTask = $task;

            if ($model->save() && $this->SetProgramTask($task,$program)) {
                return $this->redirect(['view', 'idTask' => $task, 'idProgram' => $program]);
            }
          }
        }

        return $this->render('update', [
            'model' => $model,
            'programs'=>$programs,
            'programId' => $programId,
            'tasks'=>$tasks,
            'taskId' => $taskId
        ]);
    }

    public function actionDelete($idTask, $idProgram)
    {
        $this->findModel($idTask, $idProgram)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($idTask, $idProgram)
    {
        if (($model = TaskProgram::findOne(['idTask' => $idTask, 'idProgram' => $idProgram])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

    public function SetProgramTask($task, $program)
    {
        $taskprog = $this->findModel($task,$program);
        return $taskprog->saveProgramTask($program,$task);
    }
}
