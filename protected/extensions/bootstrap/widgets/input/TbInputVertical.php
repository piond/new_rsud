<?php
/**
 * TbInputVertical class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets.input
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

Yii::import('bootstrap.widgets.input.BootInput');

/**
 * Bootstrap vertical form input widget.
 * @since 0.9.8
 */
class TbInputVertical extends TbInput
{
	/**
	 * Runs the widget.
	 */
	public function run()
	{
		if($this->useFormGroup==true)
			echo CHtml::openTag('div', array('class'=>'form-group '.$this->getContainerCssClass()));
		parent::run();
		if($this->useFormGroup==true)
			echo '</div>';
	}
	/**
	 * Renders a checkbox.
	 * @return string the rendered content
	 */
	protected function checkBox()
	{
		$attribute = $this->attribute;
		echo '<label class="checkbox" for="'.$this->getAttributeId($attribute).'">';
		echo $this->form->checkBox($this->model, $this->attribute, $this->htmlOptions).PHP_EOL;
		echo $this->model->getAttributeLabel($attribute);
		echo $this->getError().$this->getHint();
		echo '<span class="check" for="'.$this->getAttributeId($attribute).'"></span>';
		echo '</label>';
	}

	/**
	 * Renders a list of checkboxes.
	 * @return string the rendered content
	 */
	protected function checkBoxList()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo '<div class="col-lg-12">';
		echo $this->form->checkBoxList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo '</div>';
		echo $this->getError().$this->getHint();
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
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->form->dropDownList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo $this->getError().$this->getHint();
	}

	/**
	 * Renders a file field.
	 * @return string the rendered content
	 */
	protected function fileField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->form->fileField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
	}

	/**
	 * Renders a password field.
	 * @return string the rendered content
	 */
	protected function passwordField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->getPrepend();
		echo $this->form->passwordField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
	}

	/**
	 * Renders a radio button.
	 * @return string the rendered content
	 */
	protected function radioButton()
	{
		$attribute = $this->attribute;
		echo '<label class="radio" for="'.$this->getAttributeId($attribute).'">';
		echo $this->form->radioButton($this->model, $this->attribute, $this->htmlOptions).PHP_EOL;
		echo $this->model->getAttributeLabel($attribute);
		echo $this->getError().$this->getHint();
		echo '</label>';
	}

	/**
	 * Renders a list of radio buttons.
	 * @return string the rendered content
	 */
	protected function radioButtonList()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo '<div class="col-lg-12">';
		echo $this->form->radioButtonList($this->model, $this->attribute, $this->data, $this->htmlOptions);
		echo '</div>';
		echo $this->getError().$this->getHint();
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
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->form->textArea($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
	}

	/**
	 * Renders a text field.
	 * @return string the rendered content
	 */
	protected function textField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->getPrepend();
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
	}
	
	/**
	 * Renders a date field.
	 * @return string the rendered content
	 */
	protected function dateField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->getPrepend();
		echo $this->form->dateField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
	}
	
	/**
	 * Renders a time field.
	 * @return string the rendered content
	 */
	protected function timeField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->getPrepend();
		echo $this->form->timeField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
	}
	
	/**
	 * Renders a email field.
	 * @return string the rendered content
	 */
	protected function emailField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo $this->getPrepend();
		echo $this->form->emailField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getAppend();
		echo $this->getError().$this->getHint();
	}
	

	/**
	 * Renders a CAPTCHA.
	 * @return string the rendered content
	 */
	protected function captcha()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel().'<div class="captcha">';
		echo '<div class="widget">'.$this->widget('CCaptcha', $this->captchaOptions, true).'</div>';
		echo $this->form->textField($this->model, $this->attribute, $this->htmlOptions);
		echo $this->getError().$this->getHint();
		echo '</div>';
	}

	/**
	 * Renders an uneditable field.
	 * @return string the rendered content
	 */
	protected function uneditableField()
	{
		//@$this->labelOptions['class'].=' col-lg-12';
		echo $this->getLabel();
		echo CHtml::tag('span', $this->htmlOptions, $this->model->{$this->attribute});
		echo $this->getError().$this->getHint();
	}
}
