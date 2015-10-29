<?php
/**
 * TbMediaList Class File
 * @author Moh Khoirul Anam <anam@solusiq.com>
 * @copyright Copyright &copy; Moh Khoirul Anam 2013-
 * @package bootstrap.widgets
 */
class TbMediaList extends CWidget
{
	/**
	 * @var array of list items in medialist
	 */
	public $items=array();
	/**
	 * @var set the location of thumbnail images
	 */
	public $imagesLocation;
	/**
	 * @var pull all the images is left or right
	 * default are left.
	 */
	public $pullImageAll;
	/**
	 * create the media list function
	 * @param string $heading
	 * @param string $images
	 * @param string $text
	 * @param string $link
	 * @param string $pull
	 * @return string
	 */
	public function createMedia($heading,$images,$text,$link='#',$pull='left')
	{
		$media='<div class="media">'.PHP_EOL;
		
		if(!empty($this->pullImageAll)) $pull=$this->pullImageAll;
		elseif(isset($pull)) $pull=$pull;
		else $pull='left';
		
		$image=null;
		if(isset($this->imagesLocation))
			$image=$this->imagesLocation.'/';
		$image.=$images;
		
		$media.='<a class="pull-'.$pull.'" href="'.$link.'"><img class="media-object" src="'.$image.'" alt="'.$heading.'"></a>'.PHP_EOL;
		$media.='<div class="media-body">'.PHP_EOL;
		
		$media.='<h4 class="media-heading">'.$heading.'</h4>'.PHP_EOL;
		$media.=$text.PHP_EOL;
		
		$media.='</div>'.PHP_EOL;		
		$media.='</div>'.PHP_EOL;
		
		return $media;
	}
	/**
	 * create the sum list item of list items
	 * @param array $datas
	 * @return string
	 */
	public function subMedia($datas){
		$media='<div class="media-list">'.PHP_EOL;
		foreach ($datas as $data){
			if(isset($data['items'])){
				$text=isset($data['text'])?$data['text']:null;
				$text.=$this->subMedia($data['items']);
				$media.=$this->createMedia(isset($data['heading'])?$data['heading']:null, isset($data['images'])?$data['images']:null, $text,isset($data['link'])?$data['link']:null,isset($data['pullImages'])?$data['pullImages']:null);
			}
			else $media.=$this->createMedia(isset($data['heading'])?$data['heading']:null, isset($data['images'])?$data['images']:null, isset($data['text'])?$data['text']:null,isset($data['link'])?$data['link']:null,isset($data['pullImages'])?$data['pullImages']:null);
		}
		$media.='</div>'.PHP_EOL;
		return $media;
	}
	/**
	 * run this widgets(non-PHPdoc)
	 * @see CWidget::run()
	 */
	public function run(){
			echo $this->subMedia($this->items);
	}
}