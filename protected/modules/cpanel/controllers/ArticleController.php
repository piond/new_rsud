<?php

class ArticleController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
		'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array(
				'deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView($id)
	{
		$this->render(
			'view',
			array(
				'model'=>$this->loadModel($id),
			)
		);
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		
		$model = new Article;
		$_tags = new Tags;
		$_articleTag = new Articletags;
		
		$tags = Tags::model()->findAll(array('order'=>'tag'));
		$tags_list = CHtml::listData($tags, 'id', 'tag');
		
		$categories = Categories::model()->findAll(array('order'=>'category'));
		$category_list = CHtml::listData($categories, 'id', 'category');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$model->createdAt = date('Y-m-d');
			$model->modifiedAt = date('Y-m-d');
			$model->author_id = Yii::app()->user->getId();

			try{
				if($model->save()){
					$transaction->commit();
					$this->redirect(array('view','id'=>$model->id));
				}
			}catch(Exception $e){
				$transaction->rollback();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				$this->refresh();
			}
		}
		
		$this->render(
			'create',
			array(
				'model'=>$model,
				'list'=>$category_list,
				'tags'=>$tags_list
			)
		);
	}

	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$categories = Categories::model()->findAll(array('order'=>'category'));
		$category_list = CHtml::listData($categories, 'id', 'category');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$model->modifiedAt = date('Y-m-d');
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render(
			'update',
			array(
				'model'=>$model,
				'list'=>$category_list
			)
		);
	}

	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	*/
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])){
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		}else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Article');
		$this->render(
			'index',
			array(
				'dataProvider'=>$dataProvider,
			)
		);
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article'])){
			$model->attributes=$_GET['Article'];
		}

		$this->render(
			'admin',
			array(
				'model'=>$model,
			)
		);
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
		throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
