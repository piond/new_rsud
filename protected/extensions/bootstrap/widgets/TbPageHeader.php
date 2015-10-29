<?php
/**
 * TbPageHeader class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */


Yii::setPathOfAlias('widgets', dirname(__FILE__));
Yii::import('widgets.*');

class TbPageHeader extends CWidget
{
	// const type
	const TYPE_PRIMARY = 'primary';
	const TYPE_INFO = 'info';
	const TYPE_SUCCESS = 'success';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';
	const TYPE_INVERSE = 'inverse';
	const TYPE_PURPLE = 'purple';
	
	public $center=false;
	/**
	 * @var string the header text
	 */
	public $heading;
	/**
	 * @var string the slogan header text
	 */
	public $slogan;
	/**
	 * @var array the HTML attributes of header page
	 */
	public $htmlOptions=array();
	/**
	 * @var string the text type. @see the const TYPE_*
	 */
	public $textType;
	/**
	 * @var string to set the icon. valid value are glyphicon.
	 */
	public $icon;
	/**
	 * initialize widgets. (non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' page-header':$this->htmlOptions['class']='page-header';
		
		$validTypes = array(self::TYPE_PURPLE, self::TYPE_PRIMARY, self::TYPE_INFO, self::TYPE_SUCCESS,self::TYPE_WARNING, self::TYPE_DANGER, self::TYPE_INVERSE);
		
		if (isset($this->textType) and in_array($this->textType, $validTypes)){
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' text-'.$this->textType:$this->htmlOptions['class']='text-'.$this->textType;
		}
		
		if(isset($this->icon))
			$this->heading=BS3::glyphicon($this->icon,array('style'=>'font-size:36px')).' '.$this->heading;
	}
	
	/**
	 * Function to create header page
	 */
	public function createPageHeader()
	{
		$page=CHtml::openTag('div',$this->htmlOptions);
		if($this->center==true) $page.='<center>';
		$page.=CHtml::openTag('h1');
		$page.=$this->heading;
		if(isset($this->slogan)) $page.=' <small>'.$this->slogan.'</small>';
		$page.=CHtml::closeTag('h1');
		if($this->center==true) $page.='</center>';
		$page.=CHtml::closeTag('div');
		
		return $page;
	}
	/**
	 * run this widgets.(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		echo $this->createPageHeader();
	}
}