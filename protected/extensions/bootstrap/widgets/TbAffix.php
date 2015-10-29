<?php
/**
 * TbAffix class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2012-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 2.0.0
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

/**
 * Bootstrap affix widget.
 * @see http://twitter.github.com/bootstrap/javascript.html#affix
 */
class TbAffix extends CWidget
{
	const CONTAINER_PREFIX = 'yii_bootstrap_affix_';

	/**
	 * @var string the name of the affix element. Defaults to 'div'.
	 */
	public $tagName = 'div';
	/**
	 * @var array the options for the Bootstrap Javascript plugin.
	 */
	public $options = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var string to set the offset the top of affix use class element or id element.
	 */
	public $offsetTop='.navbar';
	/**
	 * @var string to set the top of affix.
	 */
	public $top="60px";
	/**
	 * @var string to set the offset the bottom of affix use class element or id elemenet.
	 */
	public $offsetBottom='#footer';
	/**
	 * @var set the parent of class.
	 */
	public $parentClass;

	private static $_containerId = 0;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if(isset($this->htmlOptions['top'])){
			$this->top=$this->htmlOptions['top'];
			unset($this->htmlOptions['top']);
		}
		
		if(isset($this->htmlOptions['parentClass'])){
			$this->parentClass=$this->htmlOptions['parentClass'];
			unset($this->htmlOptions['parentClass']);
		}
		
		if(isset($this->htmlOptions['offsetBottom'])){
			$this->offsetBottom=$this->htmlOptions['offsetBottom'];
			unset($this->htmlOptions['offsetBottom']);
		}
		
		if(isset($this->htmlOptions['offsetTop'])){
			$this->offsetTop=$this->htmlOptions['offsetTop'];
			unset($this->htmlOptions['offsetTop']);
		}
		
		if(isset($this->htmlOptions['offtop'])){
			$this->offtop=$this->htmlOptions['offtop'];
			unset($this->htmlOptions['offtop']);
		}
		
		isset($this->htmlOptions['class'])?$this->htmlOptions['class'].=$this->parentClass:$this->htmlOptions['class']=$this->parentClass;
		$this->htmlOptions['role']="complementary";
		echo CHtml::openTag($this->tagName, $this->htmlOptions);
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		//$id = $this->htmlOptions['id'];

		echo CHtml::closeTag($this->tagName);

		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();
		$cs->registerCss(__CLASS__,".affix{
		top:{$this->top};
	}");
		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
//		$cs->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').affix({$options});");
		$cs->registerScript(__CLASS__, "setTimeout(function () {
      var \$sideBar = $('.{$this->parentClass}')

      \$sideBar.affix({
        offset: {
          top: function () {
            var offsetTop      = \$sideBar.offset().top
            var sideBarMargin  = parseInt(\$sideBar.children(0).css('margin-top'), 10)
            var navOuterHeight = $('{$this->offsetTop}').height()

            return (this.top = offsetTop - navOuterHeight - sideBarMargin)
          }
        , bottom: function () {
            return (this.bottom = $('{$this->offsetBottom}').outerHeight(true))
          }
        }
      })
    }, 100)");
	}

	/**
	 * Returns the next affix container ID.
	 * @return string the id
	 * @static
	 */
	public static function getNextContainerId()
	{
		return self::CONTAINER_PREFIX.self::$_containerId++;
	}
}
