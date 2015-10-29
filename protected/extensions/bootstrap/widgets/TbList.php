<?php
/**
 * TbList class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
class TbList extends CWidget
{
	/**
	 * @var string of list is a ordered list or unordered list.
	 * valid value are ordered and unordered.
	 */
	public $list;

	/**
	 * @var type of list valid value are ul type and ol type.
	 */
	public $type;
	/**
	 * @var array the HTML attributes of list.
	 */
	public $htmlOptions;
	/**
	 * @var array | string to customize the type.
	 */
	public $customType;
	/**
	 * @var array of list items.
	 */
	public $items;
	/**
	 * @var boolean to set styled or unstyled
	 */
	public $unStyled=false;
	/**
	 * initialize widgets(non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		if(!isset($this->list))
			$this->list='unordered';
		
		if(isset($this->type))
			$this->htmlOptions['type']=$this->type;
		else $this->unStyled=true;
		
		if(isset($this->customType))
			$this->unStyled=true;
		
		if($this->unStyled==true)
			@$this->htmlOptions['class'].=' list-unstyled';
	}
	/**
	 * run this widgets(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		if ($this->list=="unordered")
			echo CHtml::openTag('ul',$this->htmlOptions);
		elseif ($this->list=="ordered")
			echo CHtml::openTag('ol',$this->htmlOptions);
		
		if(isset($this->items))
		{
			foreach ($this->items as $list){
				if(is_array($list)){
					if(isset($list['icon'])) $list['text']=BS3::glyphicon($list['icon']).' '.$list['text'];
					if(isset($this->customType)){
						is_array($this->customType) and isset($this->customType['icon'])?
						$customType=BS3::glyphicon($this->customType['icon']):
						$customType=$this->customType;
						$list['text']=$customType.' '.$list['text'];
					}
					echo CHtml::tag('li',isset($list['htmlOptions'])?$list['htmlOptions']:array(),$list['text']);
				}else{
					if(isset($this->customType)){
						is_array($this->customType) and isset($this->customType['icon'])?
						$customType=BS3::glyphicon($this->customType['icon']):
						$customType=$this->customType;
						$list=$customType.' '.$list;
					}
					echo CHtml::tag('li',array(),$list);
				}
			}
		}
		
		if ($this->list=="unordered")
			echo CHtml::closeTag('ul');
		elseif ($this->list=="ordered")
			echo CHtml::closeTag('ol');
	}
}