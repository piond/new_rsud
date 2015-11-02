<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Article');
		
		$this->render(
			'/article/index',
			array(
				'dataProvider'=>$dataProvider,
			)
		);
	}
}