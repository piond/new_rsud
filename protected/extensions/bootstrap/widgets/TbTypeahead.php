<?php
/**
 * TbTypeahead class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.10
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

/**
 * Bootstrap typeahead widget.
 * @see http://twitter.github.com/bootstrap/javascript.html#typeahead
 */
class TbTypeahead extends CInputWidget
{
	/**
	 * @var array the options for the Bootstrap Javascript plugin.
	 */
	public $options = array();
	
	public $widthControl = 4;
	
	public $labelOptions = array();
		
	public $append;
	
	public $prepend;
	
	/**
	 * @var array prepend html attributes.
	 */
	public $prependOptions = array();
	/**
	 * @var array append html attributes.
	*/
	public $appendOptions = array();

	public $label;
	
	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		$this->htmlOptions['type'] = 'text';
		$this->htmlOptions['data-provide'] = 'typeahead';
		
		if (isset($this->htmlOptions['class'])) $this->htmlOptions['class'].=' form-control';
		else $this->htmlOptions['class']='form-control';
		
		if (isset($this->htmlOptions['width'])){
			$this->widthControl=$this->htmlOptions['width'];
			unset($this->htmlOptions['width']);
		}
		
		if (isset($this->htmlOptions['labelOptions'])){
			$this->labelOptions=$this->htmlOptions['labelOptions'];
			unset($this->htmlOptions['labelOptions']);
		}
		
		if(isset($this->htmlOptions['prepend'])){
			$this->prepend=$this->htmlOptions['prepend'];
			unset($this->htmlOptions['prepend']);
		}
		
		if(isset($this->htmlOptions['append'])){
			$this->append=$this->htmlOptions['append'];
			unset($this->htmlOptions['append']);
		}
		
		if(isset($this->htmlOptions['size'])){
			$this->widthControl=$this->htmlOptions['size'];
			unset($this->htmlOptions['size']);
		}
		
		if(isset($this->labelOptions['label'])){
			$this->label=$this->labelOptions['label'];
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
		
		$this->labelOptions['class']='control-label col-md-2';
	}
	
	/**
	 * Returns the input container CSS classes.
	 * @return string the CSS class
	 */
	protected function getAddonCssClass()
	{
		$classes = array();
		if (isset($this->prepend))
			$classes[] = 'input-group';
		if (isset($this->append))
			$classes[] = 'input-group';
	
		return implode(' ', $classes);
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
			if (isset($this->prepend))
			{
				if(is_array($this->prepend)){
					if(isset($this->prepend['type']) and $this->prepend['type']=="button"){
						$this->prepend['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButton',$this->prepend['options']);
					}elseif(isset($this->prepend['type']) and $this->prepend['type']=="buttonGroup"){
						$this->prepend['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButtonGroup',$this->prepend['options']);
					}elseif(isset($this->prepend['icon'])){
						$icon=BS3::glyphicon($this->prepend['icon']);
						echo CHtml::tag('span', $htmlOptions, $icon);
					}
				}else{
					echo CHtml::tag('span', $htmlOptions, $this->prepend);
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
			if (isset($this->append))
			{
				if(is_array($this->append)){
					if(isset($this->append['type']) and $this->append['type']=="button"){
						$this->append['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButton',$this->append['options']);
					}elseif(isset($this->append['type']) and $this->append['type']=="buttonGroup"){
						$this->append['options']['htmlOptions']['apprepend']='input-group-btn';
						$this->widget('widgets.TbButtonGroup',$this->append['options']);
					}elseif(isset($this->append['icon'])){
						$icon=BS3::glyphicon($this->append['icon']);
						echo CHtml::tag('span', $htmlOptions, $icon);
					}
				}else{
					echo CHtml::tag('span', $htmlOptions, $this->append);
				}
			}

			echo '</div>';
			return ob_get_clean();
		}
		else
			return '';
	}
	
	/**
	 * Returns whether the input has an add-on (prepend and/or append).
	 * @return boolean the result
	 */
	protected function hasAddOn()
	{
		return isset($this->prepend) || isset($this->append);
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		list($name, $id) = $this->resolveNameID();

		if (isset($this->htmlOptions['id']))
			$id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $id;

		if (isset($this->htmlOptions['name']))
			$name = $this->htmlOptions['name'];

		if ($this->hasModel()){
			echo '<div class="form-group">';
			echo CHtml::activeLabelEx($this->model, $this->attribute,$this->labelOptions);
			echo '<div class="col-md-'.$this->widthControl.'">';
			echo $this->getPrepend();
			echo CHtml::activeTextField($this->model, $this->attribute, $this->htmlOptions);
			echo $this->getAppend();
			echo '</div></div>';
		}
		else{
			echo '<div class="form-group">';
			echo CHtml::label($this->label, $this->htmlOptions['id'],$this->labelOptions);
			echo '<div class="col-md-'.$this->widthControl.'">';
			echo $this->getPrepend();
			echo CHtml::textField($name, $this->value, $this->htmlOptions);
			echo $this->getAppend();
			echo '</div></div>';
		}
		
		Yii::app()->bootstrap->registerTypeahead();

		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
		Yii::app()->clientScript->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').typeahead({$options});");
	}
}
