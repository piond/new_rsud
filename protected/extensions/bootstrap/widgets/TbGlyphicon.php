<?php
/**
 * TbGlyphicon class file
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
class TbGlyphicon extends CWidget
{
	/**
	 * @var string of icon
	 */
	public $icon;
	/**
	 * run this widgets(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
		return  '<i class="fa fa-'.$this->icon.'"></i>';
	}
}