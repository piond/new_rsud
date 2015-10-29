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
class TbSidebar extends CWidget
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
		echo '<aside class="sidebar"><ul class="nav nav-tabs nav-stacked">';

		foreach ($this->items as $item)
		{
			if ($item['active']) {
				echo '<li class="active">';
			} else {
				echo '<li>';
			}

			echo '<a href="'. $item['url'] .'">
							<div>
								<div class="ico">
									<img src="'. Yii::app()->request->baseUrl . $item['icon'] .'">
                                                                </div>
                                                                <div class="title">'.$item['label'].'</div>
							</div>';

      if ($item['active']) {
				echo '<div class="arrow">
                <div class="bubble-arrow-border"></div>
                <div class="bubble-arrow"></div>
              </div>';
			}

			echo '</a></li>';
		}

			echo '<li class="">
	                <a href="#" id="btn-more">
	                    <div>
	                        <div class="ico">
	                            <img src="'. Yii::app()->request->baseUrl .'/images/icons/more.png">
	                        </div>
	                        <div class="title">
	                            Lainnya
	                        </div>
	                    </div>
	                </a>
	            </li>';

		echo '</aside></ul>';
                echo '<div class="m-sidebar-collapsed">
                            <ul class="nav nav-pills">

                            </ul>

                            <div class="arrow-border">
                                    <div class="arrow-inner"></div>
                            </div>
                    </div>';
	}
}
