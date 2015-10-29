<?php
/* @var $this SiteController */

// add meta tag
Yii::app()->clientScript->registerMetaTag('RSUD Temanggung', 'description');
Yii::app()->clientScript->registerMetaTag('tag, taging', 'keywords');
Yii::app()->clientScript->registerMetaTag('nofollow', 'robots');
Yii::app()->clientScript->registerMetaTag('RSUD Temanggung', 'description');
Yii::app()->clientScript->registerMetaTag('RSUD Temanggung', null, 'author');
		
$this->pageTitle=Yii::app()->name;

$this->category = array(
	array(
		'label' => 'Categories',
		'itemOptions' => array(
			'class' => 'nav-header'
		)
	),
	array(
		'label' => 'Instalasi Gawat Darurat',
		'itemOptions' => array(
			'class' => 'active'
		),
		'url' => array('admin')
	),
	array(
		'label' => 'Instalasi Rawat Jalan',
		'itemOptions' => array(
			'class' => 'active'
		),
		'url' => array('admin')
	),
	array(
		'label' => 'Instalasi Rawat Inap',
		'itemOptions' => array(
			'class' => 'active'
		),
		'url' => array('admin')
	),
	array(
		'label' => 'Instalasi Rawat Intensif',
		'itemOptions' => array(
			'class' => 'active'
		),
		'url' => array('admin')
	),
);
?>

<?php
	$this->widget(
		'booster.widgets.TbCarousel',
		array(
			'items' => array(
				array(
					'image' => Yii::app()->getBaseUrl().'/images/cover.jpg',
					'label' => 'First thumbnail',
					'caption' => 'First caption'
				),
				array(
					'image' => Yii::app()->getBaseUrl().'/images/cover.jpg',
					'label' => 'Second thumbnail',
					'caption' => 'Second caption'
				)
			)
		)
	);
?>

<section>
<article>
	<hgroup>
		<h1>
			Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i>
		</h1>
		<h6>
			Posted by <a href=""><?php echo Yii::app()->user->name; ?></a> on <?php echo  date('M d, Y'); ?>
		</h6>
	</hgroup>

	<p>
		Congratulations! You have successfully created your Yii application.
	</p>

	<p>
		You may change the content of this page by modifying the following two files:
	</p>
	
	<ul>
		<li>View file: <code><?php echo __FILE__; ?></code></li>
		<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
	</ul>

	<p>
		For more details on how to further develop this application, please read
		the <a href="http://www.yiiframework.com/doc/">documentation</a>.
		Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
		should you have any questions.
	</p>
	<div class="row">
		<div class="col-md-8">
			<strong>
				Tags :
			</strong>
			<a href="">RSUD</a>, <a href="">Kesehatan</a>
		</div>
		<div class="col-md-4">
			<small>
				Last Updated on <?php echo date('M d, Y'); ?>
			</small>
		</div>
	</div>	
</article>

<article>
	<hgroup>
		<h1>
			Lorem ipsum dolor sit amet
		</h1>
		<h6>
			Posted by <a href=""><?php echo Yii::app()->user->name; ?></a> on <?php echo  date('M d, Y'); ?>
		</h6>
	</hgroup>
	
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	</p>
	<div class="row">
		<div class="col-md-8">
			<strong>
				Tags :
			</strong>
			<a href="">RSUD</a>, <a href="">Kesehatan</a>
		</div>
		<div class="col-md-4">
			<small>
				Last Updated on <?php echo date('M d, Y'); ?>
			</small>
		</div>
	</div>
</article>
</section>