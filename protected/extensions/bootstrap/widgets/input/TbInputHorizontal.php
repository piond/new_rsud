<?php
/**
 * TbInputHorizontal class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets.input
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */
Yii::setPathOfAlias('widgets', dirname(__FILE__).'/../');
Yii::import('widgets.input.BootInput');

/**
 * Bootstrap horizontal form input widget.
 * @since 0.9.8
 */
class TbInputHorizontal extends TbInput
{
	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$this->hintOptions['class'] = 'alert alert-danger';
		if($this->useFormGroup==true)
			echo CHtml::openTag('div', array('class'=>'form-group '.$this->getContainerCssClass()));
		parent::run();
		if($this->useFormGroup==true)
			echo '</div>';
	}

	/**
	 * Returns the label for this block.
	 * @return string the label
	 */
	protected function getLabel()
	{
		if (isset($this->labelOptions['class']))
			$this->labelOptions['class'] .= ' col-md-'.$this->labelWidthBox.' control-label';
		else
			$this->labelOptions['class'] = 'col-md-'.$this->labelWidthBox.' control-label';

		return parent::getLabel();
	}

	/**
	 * Renders a checkbox.
	 * @return string the rendered content
	 */
	protected function checkBox()
	{
		$attribute = $this->attribute;
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo '<label class="checkbox" for="'.$this->getAttributeId($attribute).'">';
		echo $this->form->checkBox($this->model, $attribute, $this->htmlOptions).PHP_EOL;
		echo $this->model->getAttributeLabel($attribute);
		echo $this->getError().$this->getHint();
		echo '</label></div>';
	}

	/**
	 * Renders a list of checkboxes.
	 * @return string the rendered content
	 */
	protected function checkBoxList()
	{
		echo $this->getLabel();
		if(!isset($this->widthControl)) $this->widthControl=9;
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->form->checkBoxList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a list of inline checkboxes.
	 * @return string the rendered content
	 */
	protected function checkBoxListInline()
	{
		$this->htmlOptions['inline'] = true;
		$this->checkBoxList();
	}

	/**
	 * Renders a drop down list (select).
	 * @return string the rendered content
	 */
	protected function dropDownList()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->dropDownList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a file field.
	 * @return string the rendered content
	 */
	protected function fileField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->form->fileField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a password field.
	 * @return string the rendered content
	 */
	protected function passwordField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->passwordField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a radio button.
	 * @return string the rendered content
	 */
	protected function radioButton()
	{
		$attribute = $this->attribute;
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo '<label class="radio" for="'.$this->getAttributeId($attribute).'">';
		echo $this->form->radioButton($this->model, $attribute, $this->htmlOptions).PHP_EOL;
		echo $this->model->getAttributeLabel($attribute);
		echo $this->getError().$this->getHint();
		echo '</label></div>';
	}

	/**
	 * Renders a list of radio buttons.
	 * @return string the rendered content
	 */
	protected function radioButtonList()
	{
		echo $this->getLabel();
		if(!isset($this->widthControl)) $this->widthControl=9;
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->form->radioButtonList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a list of inline radio buttons.
	 * @return string the rendered content
	 */
	protected function radioButtonListInline()
	{
		$this->htmlOptions['inline'] = true;
		$this->radioButtonList();
	}

	/**
	 * Renders a textarea.
	 * @return string the rendered content
	 */
	protected function textArea()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->textArea($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a text field.
	 * @return string the rendered content
	 */
	protected function textField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}
	
	/**
	 * Renders a email field.
	 * @return string the rendered content
	 */
	protected function emailField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->emailField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}
	
	/**
	 * Renders a date field.
	 * @return string the rendered content
	 */
	protected function dateField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->dateField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}
	
	/**
	 * Renders a time field.
	 * @return string the rendered content
	 */
	protected function timeField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo $this->getPrepend();
		echo $this->form->timeField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders a CAPTCHA.
	 * @return string the rendered content
	 */
	protected function captcha()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-10"><div class="captcha">';
		echo '<div class="widget">'.$this->widget('CCaptcha', $this->captchaOptions, true).'</div>';
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
		echo '</div></div>';
	}

	/**
	 * Renders an uneditable field.
	 * @return string the rendered content
	 */
	protected function uneditableField()
	{
		if(!isset($this->widthControl)) $this->widthControl=4;
		echo $this->getLabel();
		echo '<div class="col-md-'.$this->widthControl.'">';
		echo CHtml::tag('span', $this->htmlOptions, $this->model->{$this->attribute});
		echo $this->getError().$this->getHint();
		echo '</div>';
	}
}
