<?php
/**
 * TbSidebar class file.
 * @author Aji Kisworo Mukti <adzy.maniac@gmail.com>
 * @copyright Copyright &copy; Aji Kisworo Mukti 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.7
 */

Yii::import('bootstrap.widgets.TbCollapse');

/**
 * Bootstrap sidebar widget.
 */
class TbMenuTabs extends CWidget
{
	/**
	 * @var array navigation items.
	 * @since 0.9.8
	 */
	public $items = array();

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
            if(count($this->items) > 0){
		echo '<ul class="nav nav-tabs">';
		foreach ($this->items as $item)
		{
			if ($item['active']) {
				echo '<li class="active">';
			} else {
				echo '<li>';
			}

			echo '<a href="'. $item['url'] .'">'.$item['label'].'</a>';     

			echo '</li>';
		}
                echo '</ul>';    
            }
	}
}
