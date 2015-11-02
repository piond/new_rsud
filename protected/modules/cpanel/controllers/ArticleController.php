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
		'rights', // perform access control for CRUD operations
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
		// $this->layout = '//layouts/column1';
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
	protected function getAllCategories(){
		$categories = Categories::model()->findAll(array('order'=>'category'));
		$category_list = CHtml::listData($categories, 'category_id', 'category');
		
		return $category_list;
	}
	
	protected function getAllTags(){
		$tags = Tags::model()->findAll();
		$arrTags = CHtml::listData($tags, 'tag_id', 'tag');
		
		return $arrTags;
	}
	
	protected function getArticleTags($id){
		$tag = array();
		$criteria = new CDbCriteria(
			array(
				'alias' => '_articletags',
				'condition' => '_articletags.article_id='.$id,
				'with' => array(
					'tags' => array(
						'alias' => '_tags',
						'order' => 'tag'
					)
				)
			)
		);
		$dataProvider = new CActiveDataProvider(
			'Articletags',array(
				'criteria'=>$criteria
			)
		);
		
		foreach($dataProvider->getData() as $tags){
			$_tagsId = $tags['tags']['tag_id'];
			$_tagName = $tags['tags']['tag'];
			
			$tag[$_tagsId] = $_tagName;
		}
		$tag = implode($tag, ',');
		
		return $tag;
	}
	
	public function actionCreate()
	{
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		
		$model = new Article;
		
		$arrTags = $this->getAllTags();

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
					$articleId = $model->article_id;
					$postToLower = strtolower($_POST['Article']['tags']);
					$arrPostTags = explode(',', $postToLower);
					$arrDiffTags = array_diff($arrPostTags,$arrTags);
					if(!empty($arrDiffTags)){
						foreach($arrDiffTags as $arrDiffTag){
							$row[] = array('tag'=>$arrDiffTag);
						}
						GeneralRepository::insertSeveral(Tags::model()->tableName(),$row);
					}
					
					$newArrTags = $this->getAllTags();
					$newArrDiffTags = array_intersect($newArrTags, $arrPostTags);
					foreach($newArrDiffTags as $key=>$newArrDiffTag){
						$newRow[] = array(
							'article_id' => $articleId,
							'tag_id' => $key
						);
					}
					GeneralRepository::insertSeveral(Articletags::model()->tableName(),$newRow);
					
					$transaction->commit();
					$this->redirect(array('view','id'=>$model->article_id));
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
				'category_list' => $this->getAllCategories()
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
		$connection = Yii::app()->db;
		$transaction = $connection->beginTransaction();
		
		$model=$this->loadModel($id);

		$arrTags = $this->getAllTags();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$model->modifiedAt = date('Y-m-d');
			
			try{
				if($model->save()){
					$articleId = $model->article_id;
					Articletags::model()->deleteAll('article_id = '.$id);
					
					if($_POST['Article']['tags'] != null){
						$postToLower = strtolower($_POST['Article']['tags']);
						$arrPostTags = explode(',', $postToLower);
						$arrDiffTags = array_diff($arrPostTags,$arrTags);
						if(!empty($arrDiffTags)){
							foreach($arrDiffTags as $arrDiffTag){
								$row[] = array('tag'=>$arrDiffTag);
							}
							GeneralRepository::insertSeveral(Tags::model()->tableName(),$row);
						}
						
						$newArrTags = $this->getAllTags();
						$newArrDiffTags = array_intersect($newArrTags, $arrPostTags);
						foreach($newArrDiffTags as $key=>$newArrDiffTag){
							$newRow[] = array(
								'article_id' => $articleId,
								'tag_id' => $key
							);
						}
						GeneralRepository::insertSeveral(Articletags::model()->tableName(),$newRow);
					}
					
					$transaction->commit();
					$this->redirect(array('view','id'=>$model->article_id));
				}
			}catch(Exception $e){
				$transaction->rollback();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				$this->refresh();
			}
		}

		$model['tags'] = $this->getArticleTags($id);
		
		$this->render(
			'update',
			array(
				'model'=>$model,
				'category_list' => $this->getAllCategories()
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
		$dataProvider = new CActiveDataProvider('Article');
		
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
	
	public function actionIni(){
		$criteria = new CDbCriteria(
			array(
				'alias' => '_articletags',
				'condition' => '_articletags.id=8',
				'with' => array(
					'tags' => array(
						'alias' => '_tags'
					),
					'article' => array(
						'alias' => '_article'
					)
				)
			)
		);
		
		$dataProvider = new CActiveDataProvider(
			'Articletags',array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>10,
				),
			)
		);
		
		$criteria2 = new CDbCriteria(
			array(
				'alias' => '_article',
				'condition' => '_article.article_id=1',
				'with' => array(
					'articletags' => array(
						'alias' => '_articletags',
						'with' => array(
							'tags' => array(
								'alias' => '_tags'
							)
						)
					)
				)
			)
		);
		
		$dataProvider2 = new CActiveDataProvider(
			'Article',array(
				'criteria'=>$criteria2,
				'pagination'=>array(
					'pageSize'=>10,
				),
			)
		);
		
		$criteria3 = new CDbCriteria(
			array(
				'alias' => '_tags',
				'condition' => '_tags.tag_id=1',
				'with' => array(
					'articletags' => array(
						'alias' => '_articletags'
					)
				)
			)
		);
		
		$dataProvider3 = new CActiveDataProvider(
			'Tags',array(
				'criteria'=>$criteria3,
				'pagination'=>array(
					'pageSize'=>10,
				),
			)
		);
		
		print_r($this->getArticleTags(1));
	}
}
