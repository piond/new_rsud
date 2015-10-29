<?php
/**
 * TbJumboTron class file.
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013
 * @package bootstrap.widgets
 * @since
 */

class TbJumboTron extends CWidget
{
	/*
	 * set default const type
	 */
	const TYPE_DEFAULT = 'default';
	const TYPE_PRIMARY = 'primary';
	const TYPE_INFO = 'info';
	const TYPE_SUCCESS = 'success';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';
	const TYPE_INVERSE = 'inverse';
	const TYPE_PURPLE = 'purple';
	const TYPE_WHITE = 'white';
	
	/**
	 * @var string the heading text.
	 */
	public $heading;
	/**
	 * @var boolean indicates whether to encode the heading.
	 */
	public $encodeHeading = true;
	/**
	 * @var array the HTML attributes for the heading element.
	 */
	public $headingOptions = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var string the jumbotron type
	 * @see type const TYPE_*
	 */
	public $type;
	/**
	 * @var string textType for type of the text in jumbotron heading and content
	 * @see type const TYPE_*
	 */
	public $textType;
	/**
	 * @var boolean to set the align to center
	 */	
	public $center=false;
	/**
	 * @var string to set content align
	 * valid value are left, right, center
	 */
	public $textAlign;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if (isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] .= ' jumbotron';
		else
			$this->htmlOptions['class'] = 'jumbotron';

		$validTypes = array(self::TYPE_WHITE,self::TYPE_PURPLE, self::TYPE_PRIMARY, self::TYPE_INFO, self::TYPE_SUCCESS,
				self::TYPE_WARNING, self::TYPE_DANGER, self::TYPE_INVERSE);
		if (isset($this->type) and in_array($this->type, $validTypes)){
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' jumbotron-'.$this->type:$this->htmlOptions['class']='jumbotron-'.$this->type;
		}
		if (isset($this->textType) and in_array($this->textType, $validTypes)){
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' text-'.$this->textType:$this->htmlOptions['class']='text-'.$this->textType;
		}
		if ($this->encodeHeading)
			$this->heading = CHtml::encode($this->heading);
		
		if($this->center==true)
			$this->htmlOptions['class'].=' center';
		
		if(isset($this->textAlign))
			$this->htmlOptions['class'].=' text-'.$this->textAlign;

		echo CHtml::openTag('div', $this->htmlOptions);
		echo CHtml::openTag('div',array('class'=>'container'));
		if (isset($this->heading))
			echo CHtml::tag('h1', $this->headingOptions, $this->heading);
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		echo '</div></div>';
	}
}
