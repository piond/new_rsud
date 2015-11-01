<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
	<div class="row">
		<section class="col-md-9">
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
			<!--</div>-->
		</section>
		<section class="col-md-3">
			<aside>
				<?php
					$box = $this->beginWidget(
						'booster.widgets.TbPanel',
						array(
							'title' => false,
							// 'headerIcon' => 'th-list',
							'padContent' => true,
							// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
						)
					);
				?>
					dsdsd
				<?php
					$this->endWidget(); 
				?>

				<?php
					$this->widget(
						'booster.widgets.TbMenu',
						array(
							'type' => 'list',
							'items' => $this->menu
						)
					);
					
					if(isset($this->category)){
						$this->widget(
							'booster.widgets.TbMenu',
							array(
								'type' => 'list',
								'items' => $this->category
							)
						);
					}
				?>
			</aside>
		</section>
	</div>
<?php $this->endContent(); ?>