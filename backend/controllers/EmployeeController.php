<?php

namespace backend\controllers;

use common\models\Employee;
use common\models\search\EmployeeSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post())) {
            $model->virtualImage = UploadedFile::getInstance($model, 'virtualImage');
            if ($model->validate()) {
                $filename = $model->virtualImage->baseName . rand(1001, 9009) . '.' . $model->virtualImage->extension;
                $savePathServer = Yii::getAlias('@app') . '/../uploads/' . $filename;
                $model->virtualImage->saveAs($savePathServer);
                $model->image = $filename;
                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->virtualImage = UploadedFile::getInstance($model, 'virtualImage');
            if (!empty($model->virtualImage)) {
                if ($model->validate()) {
                    $filename = $model->virtualImage->baseName . rand(1001, 9009) . '.' . $model->virtualImage->extension;
                    $savePathServer = Yii::getAlias('@app') . '/../uploads/' . $filename;
                    $model->virtualImage->saveAs($savePathServer);
                    if (file_exists(\Yii::getAlias('@app') . '/../uploads/' . $model->image)) {
                        unlink(\Yii::getAlias('@app') . '/../uploads/' . $model->image);
                        $model->image = $filename;
                    }
                    $model->image = $filename;
                    if ($model->save(false)) {
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
            } elseif ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
