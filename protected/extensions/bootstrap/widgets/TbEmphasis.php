<?php
/**
 * TbEmphasis class file.
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
class TbEmphasis extends CWidget
{
	/*
	 * Constanta Type Emphasis
	 */
	const TYPE_MUTED='muted';
	const TYPE_PRIMARY='primary';
	const TYPE_SUCCESS='success';
	const TYPE_INFO='info';
	const TYPE_WARNING='warning';
	const TYPE_DANGER='danger';
	/**
	 * @var string the text of emphasis
	 */
	public $text;
	/**
	 * @var string type of this emphasis. valid value are @see const TYPE_*
	 */
	public $type;
	
	/**
	 * create the emphasis function.
	 * @return string
	 */
	public function setEmphasis(){
		$text='<p ';
		$valid=array(self::TYPE_MUTED,self::TYPE_PRIMARY,self::TYPE_SUCCESS,self::TYPE_INFO,self::TYPE_WARNING,self::TYPE_DANGER);
		if(isset($this->type) and in_array($this->type,$valid))
			$text.='class="text-'.$this->type.'"';
		$text.='>';
		$text.=$this->text;
		return $text;
	}
	/**
	 * run this widgets
	 */
	public function run(){
		echo $this->setEmphasis();
	}
}