<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!--<div id="content">-->
	<?php
		$this->widget(
			'booster.widgets.TbBreadcrumbs',
			array(
				'links'=>$this->breadcrumbs,
			)
		);
	?>
	<?php echo $content; ?>
<!--</div>--><!-- content -->
<?php $this->endContent(); ?>