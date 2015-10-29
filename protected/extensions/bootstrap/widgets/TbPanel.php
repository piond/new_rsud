<?php
/**
 * TbPanel class file.
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013
 * @package bootstrap.widgets
 */
class TbPanel extends CWidget
{
	/*
	 * Type Panel
	 */
	const TYPE_DEFAULT = 'default';
	const TYPE_PRIMARY = 'primary';
	const TYPE_INFO = 'info';
	const TYPE_SUCCESS = 'success';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';
	/**
	 * @var string type of panel. valid value are @see const TYPE_*
	 */
	public $type;
	/**
	 * @var array the HTML attributes of panel.
	 */
	public $htmlOptions=array();
	/**
	 * @var string to set the heading panels.
	 */
	public $heading;
	/**
	 * begin of heading
	 * @param unknown $htmlOptions
	 */
	public function beginHeading($htmlOptions=array()){
		isset($htmlOptions['class'])?$htmlOptions['class'].=' panel-heading':$htmlOptions['class']='panel-heading';
		echo CHtml::openTag('div',$htmlOptions);
	}
	/**
	 * ending of heading
	 */
	public function endHeading(){
		echo CHtml::closeTag('div');
	}
	/**
	 * begin of body
	 * @param unknown $htmlOptions
	 */
	public function beginBody($htmlOptions=array()){
		isset($htmlOptions['class'])?$htmlOptions['class'].=' panel-body':$htmlOptions['class']='panel-body';
		echo CHtml::openTag('div',$htmlOptions);
	}
	/**
	 * ending of body
	 */
	public function endBody(){
		echo CHtml::closeTag('div');
	}
	/**
	 * begin of footer
	 * @param unknown $htmlOptions
	 */
	public function beginFooter($htmlOptions=array()){
		isset($htmlOptions['class'])?$htmlOptions['class'].=' panel-footer':$htmlOptions['class']='panel-footer';
		echo CHtml::openTag('div',$htmlOptions);
	}
	/**
	 * ending of footer
	 */
	public function endFooter(){
		echo CHtml::closeTag('div');
	}

	/**
	 * initialize widgets.(non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' panel':$this->htmlOptions['class']='panel';
		
		$validTypes=array(self::TYPE_DEFAULT,self::TYPE_PRIMARY,self::TYPE_SUCCESS,self::TYPE_INFO,self::TYPE_WARNING,self::TYPE_DANGER);
		
		if(isset($this->type) and in_array($this->type, $validTypes)){
			$this->htmlOptions['class'].=' panel-'.$this->type;
		}else 
			$this->htmlOptions['class'].=' panel-default';
		
		echo CHtml::openTag('div',$this->htmlOptions);
	}
	
	/**
	 * run this widgets.(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		echo CHtml::closeTag('div');
	}
}