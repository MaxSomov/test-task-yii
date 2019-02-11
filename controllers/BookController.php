<?php

namespace app\controllers;

use app\models\Author;
use Yii;
use app\models\Book;
use app\models\BookSearch;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Book::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 6]);
        $books = $query->offset($pages->offset)->limit($pages->limit)->all();

        $authors = ArrayHelper::map(Author::find()->all(), 'id', 'name');

        return $this->render('index', [
            'pages' => $pages,
            'books' => $books,
            'authors' => $authors,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $author = Author::findOne($model->author_id);

        return $this->render('view', [
            'model' => $model,
            'author' => $author->name,
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Book();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime($model->created_at);
            if ($model->save()) {
                $author = Author::findOne($model->author_id);
                $author->books_count++;
                $author->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $authors = Author::find()->all();

        return $this->render('create', [
            'model' => $model,
            'authors' => $authors
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $authors = Author::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime($model->created_at);
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'authors' => $authors,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $book = $this->findModel($id);
        $book->delete();

        $author = Author::findOne($book->author_id);
        $author->books_count--;
        $author->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
