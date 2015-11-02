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
				<?php
					echo $this->title;
				?>
				<div class="row">
					<div class="col-sm-12">
						<?php
							$this->widget(
								'booster.widgets.TbMenu',
								array(
									'type' => 'navbar',
									'items' => $this->menu
								)
							);
						?>
					</div>
				</div>
				<?php echo $content; ?>
			<!--</div>-->
		</section>
		<section class="col-md-3">
			<aside>
				<?php
					$this->widget(
						'booster.widgets.TbMenu',
						array(
							'type' => 'list',
							'items' => array(
								array(
									'label' => 'Article',
									'url' => ''
								),
								array(
									'label' => 'Categories',
									'url' => ''
								),
								array(
									'label' => 'Tags',
									'url' => ''
								),
								array(
									'label' => 'Rights',
									'url' => ''
								),
								array(
									'label' => 'User',
									'url' => ''
								)
							)
						)
					);
				?>
			</aside>
		</section>
	</div>
<?php $this->endContent(); ?>