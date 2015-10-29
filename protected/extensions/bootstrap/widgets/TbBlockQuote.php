<?php
/**
 * TbBlockQuote class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013
 * @package bootstrap.widgets
 */

class TbBlockQuote extends CWidget
{
	/**
	 * @var string text for main text quotes
	 */
	public $text;
	
	/**
	 * @var string|array items for sub quotes
	 */
	public $items;
	/**
	 * @var array for html options on this quotes
	 */
	public $htmlOptions=array();
	/**
	 * @var boolean to set a blockquote to right
	 */
	public $pullRight=false;
	/**
	 * @var string|integer to custom widt this quote
	 */
	public $width;
	/**
	 * @var string type quotes
	 */
	public $type;
	
	public function init(){
		if(isset($this->type))
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' blockquote-'.$this->type:$this->htmlOptions['class']='blockquote-'.$this->type;
		
		if($this->pullRight==true)
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' pull-right':$this->htmlOptions['class']='pull-right';
		
		if(isset($this->width))
			isset($this->htmlOptions['style'])?$this->htmlOptions['style'].='max-width:'.$this->width.'px;':$this->htmlOptions['style']='max-width:'.$this->width.'px;';
	}
	
	/**
	 * setitems a sub quotes or multiple sub quotes
	 * @return string
	 */
	public function setItems(){
		$data=null;
		if(isset($this->items)){
			if(is_array($this->items)){
				foreach ($this->items as $item){
					$data.='<small>'.$item.'</small>'.PHP_EOL;
				}
			}else{
				$data.='<small>'.$item.'</small>'.PHP_EOL;
			}
		}
		return $data;
	}
	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		if($this->pullRight==true) echo CHtml::openTag('div',array('class'=>'row'));
		echo CHtml::openTag('blockquote',$this->htmlOptions);
		
		echo '<p>';
		echo $this->text;
		echo '</p>';
		
		echo $this->setItems();
		
		echo '</blockquote>';
		if($this->pullRight==true)echo '</div>';
	}
}