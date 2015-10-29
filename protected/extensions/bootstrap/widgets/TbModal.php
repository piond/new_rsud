<?php
/**
 * TbModal class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 * @since 0.9.3
 * 
 * @Modified by Moh Khoirul Anam <anam@solusiq.com>
 */

/**
 * Bootstrap modal widget.
 * @see http://twitter.github.com/bootstrap/javascript.html#modals
 */
class TbModal extends CWidget
{
	/**
	 * @var boolean indicates whether to automatically open the modal. Defaults to 'false'.
	 */
	public $autoOpen = false;
	/**
	 * @var boolean indicates whether the modal should use transitions. Defaults to 'true'.
	 */
	public $fade = true;
	/**
	 * @var array the options for the Bootstrap Javascript plugin.
	 */
	public $options = array();
	/**
	 * @var string[] the Javascript event handlers.
	 */
	public $events = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = array();
	/**
	 * @var string to set the modal id
	 */
	public $modalId = "modalDialog";
	/**
	 * @var boolean to use close button in modal dialog.
	 */
	public $closeButton=TRUE;

	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();

		if ($this->autoOpen === false && !isset($this->options['show']))
			$this->options['show'] = false;

		$classes = array('modal');

		if ($this->fade === true)
			$classes[] = 'fade';

		if (!empty($classes))
		{
			$classes = implode(' ', $classes);
			if (isset($this->htmlOptions['class']))
				$this->htmlOptions['class'] .= ' '.$classes;
			else
				$this->htmlOptions['class'] = $classes;
		}
		
		$this->htmlOptions['id']=$this->modalId;
		$this->htmlOptions['role']="dialog";
		$this->htmlOptions['tabindex']='-1';
		$this->htmlOptions['aria-hidden']='true';

		echo CHtml::openTag('div', $this->htmlOptions);
		echo CHtml::openTag('div',array('class'=>'modal-dialog'));
		echo CHtml::openTag('div',array('class'=>'modal-content'));
	}
	
	/**
	 * function to begin of header models
	 * @param unknown $options
	 */
	public function beginHeader($options=array())
	{
		isset($options['class'])
			?$options['class'].='modal-header'
			:$options['class']='modal-header';
		echo CHtml::openTag('div',$options);
		
		if(isset($this->closeButton) && $this->closeButton==true){
			echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			unset($this->closeButton);
		}
		
		echo '<h4 class="modal-title">';
	}
	/**
	 * end of the header models
	 */
	public function endHeader(){
		echo '</h4>';
		echo CHtml::closeTag('div');
	}
	/**
	 * function to begin of body modal.
	 * @param unknown $options
	 */
	public function beginBody($options=array())
	{
		isset($options['class'])
			?$options['class'].='modal-body'
			:$options['class']='modal-body';
		echo CHtml::openTag('div',$options);
		
		if(isset($this->closeButton) && $this->closeButton==true){
			echo '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			unset($this->closeButton);
		}
	}
	/**
	 * ending of body
	 */
	public function endBody(){
		echo CHtml::closeTag('div');
	}
	/**
	 * begin the footer modal
	 * @param unknown $options
	 */
	public function beginFooter($options=array())
	{
		isset($options['class'])
			?$options['class'].='modal-footer'
			:$options['class']='modal-footer';
		echo CHtml::openTag('div',$options);
	}
	/**
	 * end of footer
	 */
	public function endFooter(){
		echo CHtml::closeTag('div');
	}

	/**
	 * Runs the widget.
	 */
	public function run()
	{
		$id = $this->modalId;

		echo '</div></div></div>';

		/** @var CClientScript $cs */
		$cs = Yii::app()->getClientScript();

		$options = !empty($this->options) ? CJavaScript::encode($this->options) : '';
		if(!empty($options))
			$cs->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').modal({$options});");

		foreach ($this->events as $name => $handler)
		{
			$handler = CJavaScript::encode($handler);
			$cs->registerScript(__CLASS__.'#'.$id.'_'.$name, "jQuery('#{$id}').on('{$name}', {$handler});");
		}
	}
}
