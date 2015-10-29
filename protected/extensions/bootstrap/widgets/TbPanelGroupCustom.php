<?php
/**
 * TbPanelGroup class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013
 * @package bootstrap.widgets
 */

class TbPanelGroupCustom extends CWidget
{
	/**
	 * initialize this widgets.(non-PHPdoc)
	 * @see CWidget::init()
	 */
	public function init(){
		echo CHtml::openTag('div',array('class'=>'panel-group'));
	}
	/**
	 * run this widgets.(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		echo CHtml::closeTag('div');
	}
}