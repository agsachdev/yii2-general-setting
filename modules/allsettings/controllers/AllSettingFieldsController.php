<?php

namespace vendor\yii2generalsetting\src\modules\allsettings\controllers;

use Yii;
use vendor\yii2generalsetting\src\modules\allsettings\models\AllSettingFields;
use vendor\yii2generalsetting\src\modules\allsettings\models\AllSettings;
use vendor\yii2generalsetting\src\modules\allsettings\models\AllSettingFieldsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AllSettingFieldsController implements the CRUD actions for AllSettingFields model.
 */
class AllSettingFieldsController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all AllSettingFields models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AllSettingFieldsSearch();
        $allSettings = AllSettings::find()->asArray()->all();
        $allSettings = ArrayHelper::map($allSettings, 'id', 'title');
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'allSettings'=>$allSettings
        ]);
    }

    /**
     * Displays a single AllSettingFields model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AllSettingFields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AllSettingFields();
        $allSettings = AllSettings::find()->asArray()->all();
        $allSettings = ArrayHelper::map($allSettings, 'id', 'title');
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'allSettings'=>$allSettings
        ]);
    }

    /**
     * Updates an existing AllSettingFields model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $allSettings = AllSettings::find()->asArray()->all();
        $allSettings = ArrayHelper::map($allSettings, 'id', 'title');
       
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'allSettings'=>$allSettings
        ]);
    }

    /**
     * Deletes an existing AllSettingFields model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AllSettingFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AllSettingFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AllSettingFields::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
