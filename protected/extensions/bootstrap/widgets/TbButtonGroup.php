<?php
/**
 * TbButtonGroup class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.10
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */
Yii::setPathOfAlias('widgets',dirname(__FILE__));
Yii::import('widgets.*');

/**
 * Bootstrap button group widget.
 * @see http://twitter.github.com/bootstrap/components.html#buttonGroups
 */
class TbButtonGroup extends CWidget
{
	// Toggle options.
	const TOGGLE_CHECKBOX = 'checkbox';
	const TOGGLE_RADIO = 'radio';

	/**
	 * @var string the button callback type.
	 * @see BootButton::buttonType
	 */
	public $buttonType = TbButton::BUTTON_LINK;
	/**
	 * @var string the button type.
	 * @see BootButton::type
	 */
	public $type;
	/**
	 * @var string the button size.
	 * @see BootButton::size
	 */
	public $size;
	/**
	 * @var boolean indicates whether to encode the button labels.
	 */
	public $encodeLabel = true;
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var array the button configuration.
	 */
	public $buttons = array();
	/**
	 * @var boolean indicates whether to enable button toggling.
	 */
	public $toggle;
	/**
	 * @var boolean indicates whether the button group appears vertically stacked. Defaults to 'false'.
	 */
	public $stacked = false;
	/**
	 * @var boolean indicates whether dropdowns should be dropups instead. Defaults to 'false'.
	 */
	public $dropup = false;
	
	/**
	 * @var boolean indicates whether to enable button group justified.
	 */
	public $justified = false;
	
	public $name;

	/*Floating right:left*/
	public $floating;
	

	/**
	 * Initializes the widget.
	 */
	public function init()
	{

		$classes = array('btn-group');		

		if ($this->stacked === true){
			unset($classes);
			$classes[] = 'btn-group-vertical';
		}
		
		if (isset($this->toggle)) {
			$this->htmlOptions['data-toggle'] = 'buttons';
		}
		
		if (isset($this->htmlOptions['apprepend'])){
			unset($classes);
			$classes[]=$this->htmlOptions['apprepend'];
			unset($this->htmlOptions['apprepend']);
		}

		if ($this->dropup === true)
			$classes[] = 'dropup';
		
		if ($this->justified === true)
			$classes[] = 'btn-group-justified';
		
		$validValue=array('xs','sm','lg');
		
		if (isset($this->size) and in_array($this->size, $validValue)) {
			$classes[]='btn-group-'.$this->size;
		}
		if(isset($this->floating) && $this->floating == 'left') $classes[]='pull-left';
		if(isset($this->floating) && $this->floating == 'right') $classes[]='pull-right';
		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}
		
		$validToggles = array(self::TOGGLE_CHECKBOX, self::TOGGLE_RADIO);

		/*if (isset($this->toggle) && in_array($this->toggle, $validToggles))
			$this->htmlOptions['data-toggle'] = 'buttons-'.$this->toggle;
*/	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		echo CHtml::openTag('div', $this->htmlOptions);

		foreach ($this->buttons as $button)
		{
			if (isset($button['visible']) && $button['visible'] === false)
				continue;
			
			$validValue=array('xs','sm','lg');
			
			if (isset($this->size) and in_array($this->size, $validValue)) {
				$button['sizeButtonGroup']=$this->size;
			}
			
			if (isset($this->toggle)){
				$options=array();
				
				$options['class']='btn';
				
				if(isset($button['type']))
					$options['class'].=' btn-'.$button['type'];
				else
					$options['class'].=' btn-default';
				if($this->toggle=="checkbox" || $this->toggle=="radio"){
					if(isset($button['active']) && $button['active'] === true)
						$options['class'].=' active';
				}				

				echo CHtml::openTag('label',$options);
				
				if($this->toggle=="checkbox" || $this->toggle=="radio"){
					$inputOptions=array();
					$inputOptions['type']=$this->toggle;
					if(isset($this->name))
						$inputOptions['name']=$this->name;
					if(isset($button['value']))
						$inputOptions['value']=$button['value'];
						
					echo CHtml::tag('input',$inputOptions,$button['label'],false);
				}
								
				echo CHtml::closeTag('label');
			}else{
				$this->controller->widget('TbButton',$button);
			}
		/*
			$this->controller->widget('TbButton', array(
				'buttonType'=>isset($button['buttonType']) ? $button['buttonType'] : $this->buttonType,
				'type'=>isset($button['type']) ? $button['type'] : $this->type,
				'size'=>$this->size, // all buttons in a group cannot vary in size
				'icon'=>isset($button['icon']) ? $button['icon'] : null,
				'splitButton'=>isset($button['splitButton']) ? $button['splitButton'] : null,
				'label'=>isset($button['label']) ? $button['label'] : null,
				'url'=>isset($button['url']) ? $button['url'] : null,
				'active'=>isset($button['active']) ? $button['active'] : false,
				'toggle'=>isset($button['toggle']) ? $button['toggle'] : null,
				'items'=>isset($button['items']) ? $button['items'] : array(),
				'ajaxOptions'=>isset($button['ajaxOptions']) ? $button['ajaxOptions'] : array(),
				'htmlOptions'=>isset($button['htmlOptions']) ? $button['htmlOptions'] : array(),
				'encodeLabel'=>isset($button['encodeLabel']) ? $button['encodeLabel'] : $this->encodeLabel,
			));
		*/
		}

		echo '</div>';
	}
}
