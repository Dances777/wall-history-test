<?php

namespace app\controllers;

use app\entities\Post;
use app\forms\PostForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $form = new PostForm();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            try {
                $post = Post::make($form->author, $form->message, Yii::$app->request->userIP);
                $post->save(false);
                Yii::$app->session->setFlash('success', 'Пост успешно добавлен!');
                return $this->refresh();
            } catch (\DomainException $exception) {
                Yii::$app->errorHandler->logException($exception);
                Yii::$app->session->setFlash('danger', $exception->getMessage());
            }
        }

        return $this->render('index', [
            'model' => $form,
            'dataProvider' => new ActiveDataProvider([
                'query' => Post::find(),
                'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]],
                'pagination' => [
                    'pageSize' => false,
                ]
            ])
        ]);
    }

    public function actionRules()
    {
        return $this->render('rules');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }


}
