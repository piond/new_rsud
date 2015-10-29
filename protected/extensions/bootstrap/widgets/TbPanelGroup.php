<?php
/**
 * TbPanelGroup class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013
 * @package bootstrap.widgets
 */

Yii::setPathOfAlias('widgets', dirname(__FILE__));
Yii::import('widgets.*');

class TbPanelGroup extends CWidget
{
	/**
	 * @var boolean to collapse panel like a accordion.
	 */
	public $collapse=false;
	/**
	 * @var string id panel of parent id
	 */
	public $parentId='accordion';
	/**
	 * @var array items of panel.
	 */
	public $panels=array();
	/**
	 * @var array the HTML attributes of widget panel.
	 */
	public $htmlOptions=array();
	/**
	 * @var set the first panel if this is a collapse.
	 */
	public $firstPanel;
	/**
	 * create the panel.
	 * @param array $panel
	 */
	public function createPanel($panel){
		
		if($this->collapse==true)
			$collapseId=TbCollapse::getNextContainerId();
		
		$options=array();
		if (isset($panel['type']))
			$options['type']=$panel['type'];
		
		$sPanel=$this->controller->beginWidget('TbPanel',$options);
		
		if(isset($panel['heading'])){
			$sPanel->beginHeading();
			if($this->collapse==true){
				echo CHtml::openTag('h4',array('class'=>'panel-title'));
				echo CHtml::openTag('a',array(
						'class'=>'accordion-toggle',
						'data-toggle'=>'collapse',
						'data-parent'=>'#'.$this->parentId,
						'href'=>'#'.$collapseId,
				));
			}
			echo $panel['heading'];
			if($this->collapse==true){
				echo CHtml::closeTag('a');
				echo CHtml::closeTag('h4');
			}
			$sPanel->endHeading();
		}
		
		if(isset($panel['body'])){
			if($this->collapse==true){
				$optionsBody['class']='panel-collapse collapse';
				
				if(!isset($this->firstPanel)){
					$this->firstPanel=true;
					$optionsBody['class'].=' in';
				}
				
				$this->controller->beginWidget('TbCollapse',array(
					'id'=>$collapseId,
					'disableOptions'=>true,
					'htmlOptions'=>$optionsBody,
				));
			}
			$sPanel->beginBody();
			echo $panel['body'];
			$sPanel->endBody();
			if($this->collapse==true)
				$this->controller->endWidget();
		}
		
		if(isset($panel['footer'])){
			$sPanel->beginFooter();
			echo $panel['footer'];
			$sPanel->endFooter();
		}
		
		$this->controller->endWidget();
	}
	/**
	 * initialize this widgets.(non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		$this->htmlOptions['class']='panel-group';
		if($this->collapse==true){
			$this->htmlOptions['id']=$this->parentId;
		}
		
	}
	/**
	 * run this widgets.(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		echo CHtml::openTag('div',$this->htmlOptions);
		
		foreach ($this->panels as $panel){
			$this->createPanel($panel);
		}
		
		echo CHtml::closeTag('div');
	}
}