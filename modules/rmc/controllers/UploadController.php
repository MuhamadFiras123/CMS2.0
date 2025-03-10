<?php
namespace app\modules\rmc\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;
use app\models\Upload;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class UploadController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Ensure only authenticated users can upload
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'handle-upload' => ['post'],
                ],
            ],
        ];
    }

    public function actionUpload()
    {
        $model = new Upload();
        
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('upload', [
                'model' => $model,
            ]);
        }
    }

    public function actionHandleUpload()
    {
        $model = new Upload();
        
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            
            if ($model->file && $model->validate()) {
                $uploadPath = Yii::getAlias('@rmcimage') . DIRECTORY_SEPARATOR . $model->file->baseName . '.' . $model->file->extension;
                if ($model->file->saveAs($uploadPath)) {
                    return $this->asJson(['status' => 'success', 'message' => 'File uploaded successfully', 'file_path' => $uploadPath]);
                }
            }
        }
        return $this->asJson(['status' => 'error', 'message' => 'Upload failed']);
    }

    public function actionViewLatest()
    {
        $latestFile = $this->getLatestUploadedFile();
        if ($latestFile) {
            return Yii::$app->response->sendFile($latestFile, null, ['inline' => true]);
        }
        throw new NotFoundHttpException('No file found.');
    }

    public function actionDownloadLatest()
    {
        $latestFile = $this->getLatestUploadedFile();
        if ($latestFile) {
            return Yii::$app->response->sendFile($latestFile);
        }
        throw new NotFoundHttpException('No file found.');
    }

    private function getLatestUploadedFile()
    {
        $uploadPath = Yii::getAlias('@rmcimage');
        $files = glob($uploadPath . '/*');
        if ($files) {
            usort($files, function ($a, $b) {
                return filemtime($b) - filemtime($a);
            });
            return $files[0];
        }
        return null;
    }
}
