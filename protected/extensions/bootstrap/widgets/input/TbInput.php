<?php
/**
 * TbInput class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets.input
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */
Yii::setPathOfAlias('widgets', dirname(__FILE__).'/../');

/**
 * Bootstrap input widget.
 * Used for rendering inputs according to Bootstrap standards.
 */
abstract class TbInput extends CInputWidget
{
	// The different input types.
	const TYPE_CHECKBOX = 'checkbox';
	const TYPE_CHECKBOXLIST = 'checkboxlist';
	const TYPE_CHECKBOXLIST_INLINE = 'checkboxlist_inline';
	const TYPE_DROPDOWN = 'dropdownlist';
	const TYPE_FILE = 'filefield';
	const TYPE_PASSWORD = 'password';
	const TYPE_RADIO = 'radiobutton';
	const TYPE_RADIOLIST = 'radiobuttonlist';
	const TYPE_RADIOLIST_INLINE = 'radiobuttonlist_inline';
	const TYPE_TEXTAREA = 'textarea';
	const TYPE_TEXT = 'text';
	const TYPE_EMAIL = 'email';
	const TYPE_DATE = 'date';
	const TYPE_TIME = 'time';
	const TYPE_CAPTCHA = 'captcha';
	const TYPE_UNEDITABLE = 'uneditable';

	/**
	 * @var TbActiveForm the associated form widget.
	 */
	public $form;
	/**
	 * @var string the input label text.
	 */
	public $label;
	/**
	 * @var string the input type.
	 * Following types are supported: checkbox, checkboxlist, dropdownlist, filefield, password,
	 * radiobutton, radiobuttonlist, textarea, textfield, captcha and uneditable.
	 */
	public $type;
	
	public $labelWidthBox=2;
	/**
	 * @var array the data for list inputs.
	 */
	public $data = array();
	/**
	 * @var string text to prepend.
	 */
	public $prependText;
	/**
	 * @var string text to append.
	 */
	public $appendText;
	/**
	 * @var string the hint text.
	 */
	public $hintText;
	/**
	 * @var array label html attributes.
	 */
	public $labelOptions = array();
	/**
	 * @var array prepend html attributes.
	 */
	public $prependOptions = array();
	/**
	 * @var array append html attributes.
	 */
	public $appendOptions = array();
	/**
	 * @var array hint html attributes.
	 */
	public $hintOptions = array();
	/**
	 * @var array error html attributes.
	 */
	public $errorOptions = array();
	/**
	 * @var array captcha html attributes.
	 */
	public $captchaOptions = array();
	
	public $widthControl;
	
	public $sizeControl = 'sm';
	
	public $useLabel = true;
	
	public $labelToPlaceHolder = false;
	
	public $useFormGroup = true;

	/**
	 * Initializes the widget.
	 * @throws CException if the widget could not be initialized.
	 */
	public function init()
	{
		if (!isset($this->form))
			throw new CException(__CLASS__.': Failed to initialize widget! Form is not set.');

		if (!isset($this->model))
			throw new CException(__CLASS__.': Failed to initialize widget! Model is not set.');

		if (!isset($this->type))
			throw new CException(__CLASS__.': Failed to initialize widget! Input type is not set.');

		// todo: move this logic elsewhere, it doesn't belong here ...
		if ($this->type === self::TYPE_UNEDITABLE)
		{
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' uneditable-input';
			else
				$this->htmlOptions['class'] = 'uneditable-input';
		}

		$this->processHtmlOptions();
	}

	/**
	 * Processes the html options.
	 */
	protected function processHtmlOptions()
	{
		if (isset($this->htmlOptions['label']))
		{
			$this->label = $this->htmlOptions['label'];
			unset($this->htmlOptions['label']);
		}
		
		if (isset($this->htmlOptions['useFormGroup']))
		{
			$this->useFormGroup = $this->htmlOptions['useFormGroup'];
			unset($this->htmlOptions['useFormGroup']);
		}
		
		if (isset($this->htmlOptions['useLabel']))
		{
			$this->useLabel = $this->htmlOptions['useLabel'];
			unset($this->htmlOptions['useLabel']);
		}
		
		if (isset($this->htmlOptions['labelWidthBox']))
		{
			$this->labelWidthBox = $this->htmlOptions['labelWidthBox'];
			unset($this->htmlOptions['labelWidthBox']);
		}
		
		if (isset($this->htmlOptions['labelToPlaceHolder']))
		{
			$this->labelToPlaceHolder = $this->htmlOptions['labelToPlaceHolder'];
			unset($this->htmlOptions['labelToPlaceHolder']);
		}

		if (isset($this->htmlOptions['prepend']))
		{
			if(is_array($this->htmlOptions['prepend']))
				$this->prependText=$this->htmlOptions['prepend'];
			else
				$this->prependText = $this->htmlOptions['prepend'];
			unset($this->htmlOptions['prepend']);
		}

		if (isset($this->htmlOptions['append']))
		{
			if(is_array($this->htmlOptions['append']))
				$this->appendText=$this->htmlOptions['append'];
			else 
				$this->appendText = $this->htmlOptions['append'];
			unset($this->htmlOptions['append']);
		}

		if (isset($this->htmlOptions['hint']))
		{
			$this->hintText = $this->htmlOptions['hint'];
			unset($this->htmlOptions['hint']);
		}

		if (isset($this->htmlOptions['labelOptions']))
		{
			$this->labelOptions = $this->htmlOptions['labelOptions'];
			unset($this->htmlOptions['labelOptions']);
		}

		if (isset($this->htmlOptions['prependOptions']))
		{
			$this->prependOptions = $this->htmlOptions['prependOptions'];
			unset($this->htmlOptions['prependOptions']);
		}

		if (isset($this->htmlOptions['appendOptions']))
		{
			$this->appendOptions = $this->htmlOptions['appendOptions'];
			unset($this->htmlOptions['appendOptions']);
		}

		if (isset($this->htmlOptions['hintOptions']))
		{
			$this->hintOptions = $this->htmlOptions['hintOptions'];
			unset($this->htmlOptions['hintOptions']);

		}

		if (isset($this->htmlOptions['errorOptions']))
		{
			$this->errorOptions = $this->htmlOptions['errorOptions'];
			unset($this->htmlOptions['errorOptions']);
		}

		if (isset($this->htmlOptions['captchaOptions']))
		{
			$this->captchaOptions = $this->htmlOptions['captchaOptions'];
			unset($this->htmlOptions['captchaOptions']);
		}
		
		if (isset($this->htmlOptions['widthBox']))
		{
			$this->widthControl = $this->htmlOptions['widthBox'];
			unset($this->htmlOptions['widthBox']);
		}
		
		if (isset($this->htmlOptions['sizeBox']))
		{
			isset($this->htmlOptions['class'])?$this->htmlOptions['class'] .= ' input-'.$this->htmlOptions['sizeBox']:$this->htmlOptions['class'] = 'input-'.$this->htmlOptions['sizeBox'];
			unset($this->htmlOptions['sizeBox']);
		}

	}

	/**
	 * Runs the widget.
	 * @throws CException if the widget type is invalid.
	 */
	public function run()
	{
		switch ($this->type)
		{
			case self::TYPE_CHECKBOX:
				$this->checkBox();
				break;

			case self::TYPE_CHECKBOXLIST:
				$this->checkBoxList();
				break;

			case self::TYPE_CHECKBOXLIST_INLINE:
				$this->checkBoxListInline();
				break;

			case self::TYPE_DROPDOWN:
				$this->dropDownList();
				break;

			case self::TYPE_FILE:
				$this->fileField();
				break;

			case self::TYPE_PASSWORD:
				$this->passwordField();
				break;

			case self::TYPE_RADIO:
				$this->radioButton();
				break;

			case self::TYPE_RADIOLIST:
				$this->radioButtonList();
				break;

			case self::TYPE_RADIOLIST_INLINE:
				$this->radioButtonListInline();
				break;

			case self::TYPE_TEXTAREA:
				$this->textArea();
				break;

			case 'textfield': // backwards compatibility
			case self::TYPE_TEXT:
				$this->textField();
				break;
			case self::TYPE_EMAIL:
				$this->emailField();
				break;
			case self::TYPE_DATE:
				$this->dateField();
				break;
				
			case self::TYPE_TIME:
				$this->timeField();
				break;

			case self::TYPE_CAPTCHA:
				$this->captcha();
				break;

			case self::TYPE_UNEDITABLE:
				$this->uneditableField();
				break;

			default:
				throw new CException(__CLASS__.': Failed to run widget! Type is invalid.');
		}
	}

	/**
	 * Returns the label for the input.
	 * @return string the label
	 */
	protected function getLabel()
	{
		//$this->labelOptions['class'].=' col-lg-12';
		if ($this->label !== false && !in_array($this->type, array('checkbox', 'radio')) && $this->hasModel()){
			if($this->labelToPlaceHolder == 1){
				$this->htmlOptions['placeholder']=$this->attribute;
			}
			if($this->useLabel === false)
				return '';
			else
				return $this->form->labelEx($this->model, $this->attribute, $this->labelOptions);
		}
		else if ($this->label !== null)
			return $this->label;
		else
			return '';
	}

	/**
	 * Returns the prepend element for the input.
	 * @return string the element
	 */
	protected function getPrepend()
	{
		if ($this->hasAddOn())
		{
			$htmlOptions = $this->prependOptions;

			if (isset($htmlOptions['class']))
				$htmlOptions['class'] .= ' input-group-addon';
			else
				$htmlOptions['class'] = 'input-group-addon';

			ob_start();
			echo '<div class="'.$this->getAddonCssClass().'">';
			if (isset($this->prependText))
			{
				if(is_array($this->prependText)){
					if(isset($this->prependText['type']) and $this->prependText['type']=="button"){
						$this->prependText['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButton',$this->prependText['options']);
					}elseif(isset($this->prependText['type']) and $this->prependText['type']=="buttonGroup"){
						$this->prependText['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButtonGroup',$this->prependText['options']);
					}elseif(isset($this->prependText['icon'])){
						$icon=BS3::glyphicon($this->prependText['icon']);
						echo CHtml::tag('span', $htmlOptions, $icon);
					}
				}else{
					echo CHtml::tag('span', $htmlOptions, $this->prependText);
				}
			}				

			return ob_get_clean();
		}
		else
			return '';
	}

	/**
	 * Returns the append element for the input.
	 * @return string the element
	 */
	protected function getAppend()
	{
		if ($this->hasAddOn())
		{
			$htmlOptions = $this->appendOptions;

			if (isset($htmlOptions['class']))
				$htmlOptions['class'] .= ' input-group-addon';
			else
				$htmlOptions['class'] = 'input-group-addon';

			ob_start();
			if (isset($this->appendText))
			{
				if(is_array($this->appendText)){
					if(isset($this->appendText['type']) and $this->appendText['type']=="button"){
						$this->appendText['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButton',$this->appendText['options']);
					}elseif(isset($this->appendText['type']) and $this->appendText['type']=="buttonGroup"){
						$this->appendText['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButtonGroup',$this->appendText['options']);
					}elseif(isset($this->appendText['icon'])){
						$icon=BS3::glyphicon($this->appendText['icon']);
						echo CHtml::tag('span', $htmlOptions, $icon);
					}
				}else{
					echo CHtml::tag('span', $htmlOptions, $this->appendText);
				}
			}

			echo '</div>';
			return ob_get_clean();
		}
		else
			return '';
	}
	
	/**
	 * Returns the id that should be used for the specified attribute
	 * @param string $attribute the attribute
	 * @return string the id 
	 */
	protected function getAttributeId($attribute) 
	{
		return isset($this->htmlOptions['id'])
				? $this->htmlOptions['id']
				: CHtml::getIdByName(CHtml::resolveName($this->model, $attribute));
	}

	/**
	 * Returns the error text for the input.
	 * @return string the error text
	 */
	protected function getError()
	{
		return $this->form->error($this->model, $this->attribute, $this->errorOptions);
	}

	/**
	 * Returns the hint text for the input.
	 * @return string the hint text
	 */
	protected function getHint()
	{
		if (isset($this->hintText))
		{
			$htmlOptions = $this->hintOptions;

			if (isset($htmlOptions['class']))
				$htmlOptions['class'] .= ' help-block';
			else
				$htmlOptions['class'] = 'help-block';

			return CHtml::tag('p', $htmlOptions, $this->hintText);
		}
		else
			return '';
	}

	/**
	 * Returns the container CSS class for the input.
	 * @return string the CSS class
	 */
	protected function getContainerCssClass()
	{
		$attribute = $this->attribute;
		//return $this->model->hasErrors(CHtml::resolveName($this->model, $attribute)) ? CHtml::$errorCss : '';
		//return $this->model->hasErrors(CHtml::resolveName($this->model, $attribute)) ? ' has-error ': '';
		return $this->model->hasErrors($attribute) ? ' has-error ' : '';
	}

	/**
	 * Returns the input container CSS classes.
	 * @return string the CSS class
	 */
	protected function getAddonCssClass()
	{
		$classes = array();
		if (isset($this->prependText))
			$classes[] = 'input-group';
		if (isset($this->appendText))
			$classes[] = 'input-group';

		return implode(' ', $classes);
	}

	/**
	 * Returns whether the input has an add-on (prepend and/or append).
	 * @return boolean the result
	 */
	protected function hasAddOn()
	{
		return isset($this->prependText) || isset($this->appendText);
	}

	/**
	 * Renders a checkbox.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function checkBox();

	/**
	 * Renders a list of checkboxes.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function checkBoxList();

	/**
	 * Renders a list of inline checkboxes.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function checkBoxListInline();

	/**
	 * Renders a drop down list (select).
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function dropDownList();

	/**
	 * Renders a file field.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function fileField();

	/**
	 * Renders a password field.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function passwordField();

	/**
	 * Renders a radio button.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function radioButton();

	/**
	 * Renders a list of radio buttons.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function radioButtonList();

	/**
	 * Renders a list of inline radio buttons.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function radioButtonListInline();

	/**
	 * Renders a textarea.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function textArea();

	/**
	 * Renders a text field.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function textField();

	/**
	 * Renders a CAPTCHA.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function captcha();

	/**
	 * Renders an uneditable field.
	 * @return string the rendered content
	 * @abstract
	 */
	abstract protected function uneditableField();
}
