<?php
/**
 * TbListGroup class file.
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
Yii::setPathOfAlias('widgets',dirname(__FILE__).'/../widgets');
Yii::import('widgets.*');

class TbListGroup extends CWidget
{
	/**
	 * @var array of list items.
	 */
	public $items=array();
	/**
	 * @var array the HTML attributes of list group
	 */
	public $htmlOptions=array();
	
	/**
	 * initialize widgets(non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=' list-group':$this->htmlOptions['class']='list-group';
	}
	/**
	 * Create the list
	 */
	public function createList(){
		foreach ($this->items as $data){
			$text=null;
			if(isset($data['text'])){
				if(is_array($data['text']))
				{	
						if(isset($data['text']['heading'])){
							if(isset($data['icon'])){
								$data['text']['heading']=CHtml::tag('i',array('class'=>'glyphicon glyphicon-'.$data['icon']),'').' '.$data['text']['heading'];
								unset($data['icon']);
							}
							if(isset($data['badge'])){
								$data['text']['heading'].=CHtml::tag('span',array('class'=>'badge pull-right'),$data['badge']);
								unset($data['badge']);
							}
							$text.=CHtml::tag('h4',array('class'=>'list-group-item-heading'),$data['text']['heading']);//'<h4 class="list-group-item-heading">'.$data['text']['heading'].'</h4>';
						}
						if(isset($data['text']['text']))
							$text.=CHtml::tag('p',array('class'=>'list-group-item-text'),$data['text']['text']);//'<p class="list-group-item-text">'.$data['text']['text'].'</p>';
				}else
					$text=$data['text'];
			}
			if(isset($data['icon']))
				$text=CHtml::tag('i',array('class'=>'glyphicon glyphicon-'.$data['icon']),'').' '.$text;
			
			if(isset($data['badge']))
				$text.=CHtml::tag('span',array('class'=>'badge'),$data['badge']);
			
			$htmlOptions=isset($data['htmlOptions'])?$data['htmlOptions']:array();
			!isset($htmlOptions['class'])?$htmlOptions['class']='list-group-item':$htmlOptions['class'].=' list-group-item';
			
			if(isset($data['active']) and $data['active']==true)
				$htmlOptions['class'].=" active";
			
			echo CHtml::link($text,isset($data['url'])?$data['url']:null,$htmlOptions);
		}
	}
	/**
	 * runt this widgets(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		echo CHtml::openTag('div',$this->htmlOptions);
		
		$this->createList();
		
		echo CHtml::closeTag('div');
	}
}