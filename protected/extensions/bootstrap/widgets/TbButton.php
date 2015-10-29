<?php
/**
 * TbButton class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.10
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

Yii::setPathOfAlias('widgets', dirname(__FILE__));
Yii::import('widgets.*');

/**
 * Bootstrap button widget.
 * @see http://twitter.github.com/bootstrap/base-css.html#buttons
 */
class TbButton extends CWidget
{
	// Button callback types.
	const BUTTON_LINK = 'link';
	const BUTTON_BUTTON = 'button';
	const BUTTON_SUBMIT = 'submit';
	const BUTTON_SUBMITLINK = 'submitLink';
	const BUTTON_RESET = 'reset';
	const BUTTON_AJAXLINK = 'ajaxLink';
	const BUTTON_AJAXBUTTON = 'ajaxButton';
	const BUTTON_AJAXSUBMIT = 'ajaxSubmit';
	const BUTTON_INPUTBUTTON = 'inputButton';
	const BUTTON_INPUTSUBMIT = 'inputSubmit';

	// Button types.
	const TYPE_DEFAULT = 'default';
	const TYPE_PRIMARY = 'primary';
	const TYPE_INFO = 'info';
	const TYPE_SUCCESS = 'success';
	const TYPE_WARNING = 'warning';
	const TYPE_DANGER = 'danger';
	const TYPE_INVERSE = 'inverse';
	const TYPE_LINK = 'link';

	// Button sizes.
	const SIZE_MINI = 'xs';
	const SIZE_SMALL = 'sm';
	const SIZE_LARGE = 'lg';

	/**
	 * @var string the button callback types.
	 * Valid values are 'link', 'button', 'submit', 'submitLink', 'reset', 'ajaxLink', 'ajaxButton' and 'ajaxSubmit'.
	 */
	public $buttonType = self::BUTTON_LINK;
	/**
	 * @var string the button type.
	 * Valid values are 'primary', 'info', 'success', 'warning', 'danger' and 'inverse'.
	 */
	public $type;
	/**
	 * @var string the button size.
	 * Valid values are 'large', 'small' and 'mini'.
	 */
	public $size;
	/**
	 * @var string the button icon, e.g. 'ok' or 'remove white'.
	 */
	public $icon;
	/**
	 * @var string the button label.
	 */
	public $label;
	/**
	 * @var string the button URL.
	 */
	public $url;
	/**
	 * @var boolean indicates whether the button should span the full width of the a parent.
	 */
	public $block = false;
	/**
	 * @var boolean indicates whether the button is active.
	 */
	public $active = false;
	/**
	 * @var boolean indicates whether the button is disabled.
	 */
	public $disabled = false;
	/**
	 * @var boolean indicates whether to encode the label.
	 */
	public $encodeLabel = true;
	/**
	 * @var boolean indicates whether to enable toggle.
	 */
	public $toggle;
	/**
	 * @var string the loading text.
	 */
	public $loadingText;
	/**
	 * @var string the complete text.
	 */
	public $completeText;
	/**
	* @var array the dropdown button items.
	*/
	public $items;
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var array the button ajax options (used by 'ajaxLink' and 'ajaxButton').
	 */
	public $ajaxOptions = array();
	/**
	 * @var array the HTML attributes for the dropdown menu.
	 * @since 0.9.11
	 */
	public $dropdownOptions = array();
	/**
	 * @var boolean to split the button dropdown.
	 */
	public $splitButton = false;
	/**
	 * @var array the HTML attributes for the split button
	 */
	public $splitOptions = array();
	/**
	 * @var set the button group class.
	 */
	public $classGroup='btn-group';
	/**
	 * @var boolean to set the prepend or append if this button is grouped with form input.
	 */
	public $apprepend=false;
	/**
	 * @var string to set the size of the button group.
	 */
	public $sizeButtonGroup;
	/**
	 * @var string | array to set the tooltip in button.
	 */
	public $tooltip;
	/**
	 * @var integer set the timeout of loading button.
	 */
	public $timeOut=3;
	/**
	 * @var string | array to set the popover in button.
	 */
	public $popover;
	/**
	 * @var boolean to set the dropup button.
	 */
	public $dropup=false;
	
	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$classes = array('btn');
	
		$validTypes = array(self::TYPE_LINK, self::TYPE_PRIMARY, self::TYPE_INFO, self::TYPE_SUCCESS,
				self::TYPE_WARNING, self::TYPE_DANGER, self::TYPE_INVERSE);

		if (isset($this->type)) // && in_array($this->type, $validTypes)
			$classes[] = 'btn-'.$this->type;
		else 
			$classes[] = 'btn-'.self::TYPE_DEFAULT;

		$validSizes = array(self::SIZE_LARGE, self::SIZE_SMALL, self::SIZE_MINI);

		if (isset($this->size) && in_array($this->size, $validSizes))
			$classes[] = 'btn-'.$this->size;

		if ($this->block)
			$classes[] = 'btn-block';
		
		if ($this->active)
			$classes[] = 'active';

		if ($this->disabled)
		{
			$disableTypes = array(self::BUTTON_BUTTON, self::BUTTON_SUBMIT, self::BUTTON_RESET,
				self::BUTTON_AJAXBUTTON, self::BUTTON_AJAXSUBMIT, self::BUTTON_INPUTBUTTON, self::BUTTON_INPUTSUBMIT);

			if (in_array($this->buttonType, $disableTypes))
				$this->htmlOptions['disabled'] = 'disabled';

			$classes[] = 'disabled';
		}

        if (!isset($this->url) && isset($this->htmlOptions['href']))
        {
            $this->url = $this->htmlOptions['href'];
            unset($this->htmlOptions['href']);
        }

		if ($this->encodeLabel)
			$this->label = CHtml::encode($this->label);

		if ($this->hasDropdown())
		{
			if (!isset($this->url))
				$this->url = '#';

			if($this->splitButton==false){
				$classes[] = 'dropdown-toggle';
				$this->label .= ' <span class="caret"></span>';
				$this->htmlOptions['data-toggle'] = 'dropdown';
			}else{
				$this->splitOptions['class']='dropdown-toggle';
				$this->splitOptions['data-toggle'] = 'dropdown';
			}
		}

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
			if (isset($this->splitOptions['class']))
				$this->splitOptions['class'] .= ' '.$classes;
			else
				$this->splitOptions['class'] = $classes;
		}

		if (isset($this->icon))
		{
			if (strpos($this->icon, 'fa') === false)
				$this->icon = 'fa-'.implode(' fa-', explode(' ', $this->icon));

			$this->label = '<i class="fa '.$this->icon.'"></i> '.$this->label;
		}

		if (isset($this->toggle)){
			$toggle=$this->toggle;
			unset($this->toggle);
			if($toggle==='modal')
				$this->htmlOptions['data-toggle'] = 'modal';
			elseif($toggle==='closeModal')
				$this->htmlOptions['data-dismiss'] = 'modal';
			elseif($toggle===true)
				$this->htmlOptions['data-toggle'] = 'button';
		}
		
		if (isset($this->loadingText)){
			$this->htmlOptions['data-loading-text'] = $this->loadingText;
			
			if (!isset($this->htmlOptions['id'])) {
				$this->htmlOptions['id']="Tb_".rand(0,9999);
			}
			
			$cc=Yii::app()->getClientScript();
			$timeOut=$this->timeOut*1000;
			
			$cc->registerScript('ButtonLoading_#'.$this->htmlOptions['id'],"jQuery('#{$this->htmlOptions['id']}').click(function(){
	var btn = $(this);
	btn.button('loading');
});");
			if (!isset($this->completeText)) {
			$cc->registerScript('ButtonReset_#'.$this->htmlOptions['id'],"jQuery('#{$this->htmlOptions['id']}').click(function(){
	var btn = $(this);
	setTimeout(function() {
		btn.button('reset');
	}, {$timeOut});
});");
			}
		}

		if (isset($this->completeText)){
			$this->htmlOptions['data-complete-text'] = $this->completeText;
			if (!isset($this->htmlOptions['id'])) {
				$this->htmlOptions['id']="Tb_".rand(0,9999);
			}
				
			$cc=Yii::app()->getClientScript();
				
			$timeOut=$this->timeOut*1000;
			$timeOuts=($timeOut*3)/2;
				
			$cc->registerScript('ButtonComplete_#'.$this->htmlOptions['id'],"jQuery('#{$this->htmlOptions['id']}').click(function(){
	var btn = $(this);
	setTimeout(function() {
		btn.button('complete');
	}, {$timeOut});
	setTimeout(function() {
		btn.button('reset');
	}, {$timeOuts});
});");
		}
		
		if (isset($this->htmlOptions['apprepend'])){
			$this->apprepend=true;
			$this->classGroup=$this->htmlOptions['apprepend'];
			unset($this->htmlOptions['apprepend']);
		}
		
		if (isset($this->sizeButtonGroup))
			$this->classGroup.=' btn-group-'.$this->sizeButtonGroup;
		
		if ($this->dropup==true)
			$this->classGroup.=' dropup';
		
		if (isset($this->tooltip)){
			$this->createTooltip();
		}elseif (isset($this->htmlOptions['rel']) && $this->htmlOptions['rel']=='tooltip'){
			$this->tooltip=$this->htmlOptions['title'];
			$this->createTooltip();
			unset($this->htmlOptions['rel']);
		}

		if (isset($this->popover)){
			$popover=$this->popover;
			unset($this->popover);
				
			if (!isset($this->htmlOptions['id'])) {
				$this->htmlOptions['id']="Tb_".rand(0,9999);
			}
				
			$this->htmlOptions['data-toggle']='tooltip';
			if(isset($popover['placement']))
				$this->htmlOptions['data-placement']=$popover['placement'];
			
			if(isset($popover['title'])){
				$this->htmlOptions['data-original-title']=$popover['title'];
			}
			if(isset($popover['content'])){
				$this->htmlOptions['data-content']=$popover['content'];
			}
				
			$cc=Yii::app()->getClientScript();
				
			$cc->registerScript('ButtonPopover_#'.$this->htmlOptions['id'],"jQuery('#{$this->htmlOptions['id']}').popover();");
		}
	}
	
	/**
	 * function to create the tooltip
	 */
	private function createTooltip(){
		$tooltip=$this->tooltip;
		unset($this->tooltip);
			
		if (!isset($this->htmlOptions['id'])) {
			$this->htmlOptions['id']="TbButton_".rand(0,9999);
		}
			
		$this->htmlOptions['data-toggle']='tooltip';
		$this->htmlOptions['data-placement']='top';
		if(isset($tooltip['placement']) and in_array($tooltip['placement'],array('top','left','right','bottom')))
			$this->htmlOptions['data-placement']=$tooltip['placement'];
		if(isset($tooltip['text'])){
			$this->htmlOptions['data-original-title']=$tooltip['text'];
		}else{
			$this->htmlOptions['data-original-title']=$tooltip;
		}
			
		$cc=Yii::app()->getClientScript();
			
		$cc->registerScript('ButtonTooltip_#'.$this->htmlOptions['id'],"jQuery('#{$this->htmlOptions['id']}').tooltip();");
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if($this->hasDropdown()/* and $this->apprepend==true*/){
			echo '<div class="'.$this->classGroup.'">';
		}
		if($this->apprepend==true and !$this->hasDropdown())
			echo '<span class="'.$this->classGroup.'">';

		echo $this->createButton();
		
		if ($this->splitButton==true) echo CHtml::link('&nbsp;<span class="caret"></span>&nbsp;','#',$this->splitOptions);

		if ($this->hasDropdown())
		{
			$this->controller->widget('TbDropdown', array(
				'encodeLabel'=>$this->encodeLabel,
				'items'=>$this->items,
				'htmlOptions'=>$this->dropdownOptions,
			));
		}
		if($this->hasDropdown()/* and $this->apprepend==true*/) echo '</div>';
		
		if($this->apprepend==true and !$this->hasDropdown())
			echo '</span>';
	}

	/**
	 * Creates the button element.
	 * @return string the created button.
	 */
	protected function createButton()
	{
		switch ($this->buttonType)
		{
			case self::BUTTON_BUTTON:
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_SUBMIT:
				$this->htmlOptions['type'] = 'submit';
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_RESET:
				$this->htmlOptions['type'] = 'reset';
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_SUBMITLINK:
				return CHtml::linkButton($this->label, $this->htmlOptions);

			case self::BUTTON_AJAXLINK:
				return CHtml::ajaxLink($this->label, $this->url, $this->ajaxOptions, $this->htmlOptions);

			case self::BUTTON_AJAXBUTTON:
				$this->ajaxOptions['url'] = $this->url;
				$this->htmlOptions['ajax'] = $this->ajaxOptions;
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_AJAXSUBMIT:
				$this->ajaxOptions['type'] = isset($this->ajaxOptions['type']) ? $this->ajaxOptions['type'] : 'POST';
				$this->ajaxOptions['url'] = $this->url;
				$this->htmlOptions['type'] = 'submit';
				$this->htmlOptions['ajax'] = $this->ajaxOptions;
				return CHtml::htmlButton($this->label, $this->htmlOptions);

			case self::BUTTON_INPUTBUTTON:
				return CHtml::button($this->label, $this->htmlOptions);

			case self::BUTTON_INPUTSUBMIT:
				$this->htmlOptions['type'] = 'submit';
				return CHtml::button($this->label, $this->htmlOptions);

			default:
			case self::BUTTON_LINK:
				return CHtml::link($this->label, $this->url, $this->htmlOptions);
		}
	}

	/**
	 * Returns whether the button has a dropdown.
	 * @return bool the result.
	 */
	protected function hasDropdown()
	{
		return isset($this->items) && !empty($this->items);
	}
}
