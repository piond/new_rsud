<?php

Yii::setPathOfAlias('widgets',dirname(__FILE__).'/../widgets');
Yii::import('widgets.*');

class BS3 extends CHtml{
	
	public static function navbar(){
		return 'TbNavbar';
	}
	
	public static function panel(){
		return 'TbPanel';
	}
	
	public static function panelGroup($options=array()){
		Yii::app()->controller->widget('TbPanelGroup',$options);
	}
	
	public static function panelGroupCustom(){
		return 'TbPanelGroupCustom';
	}
	
	public static function menu($options=array()){
		Yii::app()->controller->widget('TbMenu',$options);
	}
	
	public static function button($options=array()){
		Yii::app()->controller->widget('TbButton',$options);
	}
	
	public static function buttonGroup($options=array()){
		Yii::app()->controller->widget('TbButtonGroup',$options);
	}
	
	public static function breadcrumbs($options=array()){
		Yii::app()->controller->widget('TbBreadcrumbs',$options);
	}
	
	public static function quote($options=array()){
		Yii::app()->controller->widget('TbBlockQuote',$options);
	}
	
	public static function quoteMulty($options=array()){
		Yii::app()->controller->widget('TbMultiBlockQuote',$options);
	}
	
	public static function mediaList($options=array()){
		Yii::app()->controller->widget('TbMediaList',$options);
	}
	
	public static function labelBs($options=array()){
		Yii::app()->controller->widget('TbLabel',$options);
	}
	
	public static function typeahead($options=array()){
		Yii::app()->controller->widget('TbTypeahead',$options);
	}
	
	public static function glyphicon($icon,$htmlOptions=array()){
		$htmlOptions['class']='glyphicon glyphicon-'.$icon;
		return CHtml::tag('i',$htmlOptions,'');
	}
	
	public static function detailView($options=array()){
		Yii::app()->controller->widget('TbDetailView',$options);
	}
	
	public static function bedge($options=array()){
		Yii::app()->controller->widget('TbBedge',$options);
	}
	
	public static function carousel($options=array()){
		Yii::app()->controller->widget('TbCarousel',$options);
	}
	
	public static function modal(){
		return 'TbModal';
	}
	
	public static function pageHeader($options=array()){
		Yii::app()->controller->widget('TbPageHeader',$options);
	}
	
	public static function gridView($options=array()){
		Yii::app()->controller->widget('TbGridView',$options);
	}
	
	public static function buttonColumn(){
		return 'TbButtonColumn';
	}
	
	public static function activeForm(){
		return 'TbActiveForm';
	}
	
	public static function jumbotron(){
		return 'TbJumboTron';
	}
	
	public static function listGroup($options=array()){
		Yii::app()->controller->widget('TbListGroup',$options);
	}
	
	public static function unorderedList($options=array()){
		$options['list']='unordered';
		Yii::app()->controller->widget('TbList',$options);
	}
	
	public static function orderedList($options=array()){
		$options['list']='ordered';
		Yii::app()->controller->widget('TbList',$options);
	}
}