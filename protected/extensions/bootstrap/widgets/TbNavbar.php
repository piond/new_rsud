<?php
/**
 * TbNavbar class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.7
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

Yii::setPathOfAlias('widgets',dirname(__FILE__));
Yii::import('widgets.*');

/**
 * Bootstrap navigation bar widget.
 */
class TbNavbar extends CWidget
{
	// Navbar types.
	const TYPE_INVERSE = 'inverse';
	const TYPE_DEFAULT = 'default';
	const TYPE_PRIMARY = 'primary';
	const TYPE_SUCCESS = 'success';
	const TYPE_INFO = 'info';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';
	const TYPE_PURPLE = 'purple';

	// Navbar fix locations.
	const FIXED_TOP = 'top';
	const FIXED_BOTTOM = 'bottom';

	/**
	 * @var string the navbar type. Valid values are @see const TYPE_*.
	 * @since 1.0.0
	 */
	public $type;
	/**
	 * @var string the text for the brand.
	 */
	public $brand;
	/**
	 * @var string the URL for the brand link.
	 */
	public $brandUrl;
	/**
	 * @var array the HTML attributes for the brand link.
	 */
	public $brandOptions = array();
	/**
	 * @var mixed fix location of the navbar if applicable.
	 * Valid values are 'top' and 'bottom'. Defaults to 'top'.
	 * Setting the value to false will make the navbar static.
	 * @since 0.9.8
	 */
	public $fixed = self::FIXED_TOP;
	/**
	* @var boolean whether the nav span over the full width. Defaults to false.
	* @since 0.9.8
	*/
	public $fluid = false;
	/**
	 * @var boolean whether to enable collapsing on narrow screens. Default to false.
	 */
	public $collapse = false;
	/**
	 * @var array navigation items.
	 * @since 0.9.8
	 */
	public $items = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var boolean to set navbar menu dropdown to dropup.
	 */
	public $dropup=false;
	/**
	 * @var boolean to set justified align of navbar menu.
	 */
	public $justified=false;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if ($this->brand !== false)
		{
			if (!isset($this->brand))
				$this->brand = CHtml::encode(Yii::app()->name);

			if (!isset($this->brandUrl))
				$this->brandUrl = Yii::app()->homeUrl;

			$this->brandOptions['href'] = CHtml::normalizeUrl($this->brandUrl);

			if (isset($this->brandOptions['class']))
				$this->brandOptions['class'] .= ' navbar-brand';
			else
				$this->brandOptions['class'] = 'navbar-brand';
		}

		$classes = array('navbar');
		$this->htmlOptions['role']="navigation";
		
		$types= array(self::TYPE_INVERSE,self::TYPE_DEFAULT,self::TYPE_INFO,self::TYPE_PRIMARY,self::TYPE_SUCCESS,self::TYPE_WARNING,self::TYPE_DANGER,self::TYPE_PURPLE);

		if (isset($this->type) && in_array($this->type, $types))
			$classes[] = 'navbar-'.$this->type;
		else $classes[] = 'navbar-'.self::TYPE_DEFAULT;

		if ($this->fixed !== false && in_array($this->fixed, array(self::FIXED_TOP, self::FIXED_BOTTOM)))
			$classes[] = 'navbar-fixed-'.$this->fixed;

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		echo CHtml::openTag('nav', $this->htmlOptions);
		echo '<div class="'.$this->getContainerCssClass().'">';

		$collapseId = TbCollapse::getNextContainerId();
		echo '<div class="navbar-header">';
		if ($this->collapse !== false)
		{
			echo '<a class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target="#'.$collapseId.'">';
			echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
			echo '</a>';
		}

		if ($this->brand !== false)
		{
			if ($this->brandUrl !== false)
				echo CHtml::openTag('a', $this->brandOptions).$this->brand.'</a>';
			else
			{
				unset($this->brandOptions['href']); // spans cannot have a href attribute
				echo CHtml::openTag('span', $this->brandOptions).$this->brand.'</span>';
			}
		}

		echo "</div>";
		
		if ($this->collapse !== false)
		{
			$this->controller->beginWidget('TbCollapse', array(
				'id'=>$collapseId,
				'toggle'=>false, // navbars should be collapsed by default
				'htmlOptions'=>array('class'=>'collapse navbar-collapse'),
			));
		}

		foreach ($this->items as $item)
		{
			if (is_string($item))
				echo $item;
			else
			{
				if (isset($item['class']))
				{
					$className = $item['class'];
					if(preg_match('/TbMenu/i', $className)){
						if($this->justified==true){
							$item['justified']=true;
						}else
						isset($item['htmlOptions']['class'])?$item['htmlOptions']['class'].=" navbar-nav":$item['htmlOptions']['class']=" navbar-nav";
						if($this->dropup==true){
							$item['htmlOptions']['class'].=" dropup";
						}
					}
					unset($item['class']);

					$this->controller->widget($className, $item);
				}
			}
		}

		if ($this->collapse !== false)
			$this->controller->endWidget();

		echo '</div></nav>';
	}

	/**
	 * Returns the navbar container CSS class.
	 * @return string the class
	 */
	protected function getContainerCssClass()
	{
		return $this->fluid ? '' : 'container';
	}
}
