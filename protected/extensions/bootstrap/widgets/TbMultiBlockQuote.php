<?php
/**
 * TbMultiBlockQuote class file.
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
Yii::setPathOfAlias('widgets',Yii::getPathOfAlias('ext.bootstrap.widgets'));
Yii::import('widgets.TbBlockQuote');

class TbMultiBlockQuote extends CWidget
{
	/**
	 * @var array for multiple blockquote
	 */
	public $items=array();
	/**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run()
	{
		foreach ($this->items as $item)
		{
			$options=array();
			if(isset($item['text'])) $options['text']=$item['text'];
			if(isset($item['htmlOptions'])) $options['htmlOptions']=$item['htmlOptions'];
			if(isset($item['pullRight'])) $options['pullRight']=$item['pullRight'];
			if(isset($item['width'])) $options['width']=$item['width'];
			if(isset($item['type'])) $options['type']=$item['type'];
			if(isset($item['items'])) $options['items']=$item['items'];
			$this->widget('bootstrap.widgets.TbBlockQuote',$options);
		}
	}
}