<?php
	$this->breadcrumbs = array(
		'Rights'=>Rights::getBaseUrl(),
		Rights::getAuthItemTypeNamePlural($model->type)=>Rights::getAuthItemRoute($model->type),
		$model->name,
	);
	
	$this->title = '<h2>'.Rights::t('core', 'Update :name', array(':name'=>$model->name,':type'=>Rights::getAuthItemTypeName($model->type),)).'</h2>';
?>

<?php
	echo $this->renderPartial('/_menu',array(
		'list'=> array(),
	));
?>

<?php 
	$this->renderPartial('/_flash'); 
?>

<?php
	$this->renderPartial('_form', array('model'=>$formModel));
?>

<div class="relations span-11 last">

	<h3>
		<?php 
			echo Rights::t('core', 'Relations'); 
		?>
	</h3>

	<?php
		if( $model->name!==Rights::module()->superuserName ): 
	?>

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

			<h4>
				<?php 
					echo Rights::t('core', 'Parents'); 
				?>
			</h4>

			<?php
				$this->widget('booster.widgets.TbGridView', array(
					'dataProvider'=>$parentDataProvider,
					'template'=>'{items}',
					'hideHeader'=>true,
					'emptyText'=>Rights::t('core', 'This item has no parents.'),
					'htmlOptions'=>array('class'=>'grid-view parent-table mini'),
					'columns'=>array(
						array(
							'name'=>'name',
							'header'=>Rights::t('core', 'Name'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'name-column'),
							'value'=>'$data->getNameLink()',
						),
						array(
							'name'=>'type',
							'header'=>Rights::t('core', 'Type'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'type-column'),
							'value'=>'$data->getTypeText()',
						),
						array(
							'header'=>'&nbsp;',
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'actions-column'),
							'value'=>'',
						),
					)
				)); 
			?>

		<?php
			$this->endWidget(); 
		?>

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
			<h4>
				<?php
					echo Rights::t('core', 'Children'); 
				?>
			</h4>

			<?php 
				$this->widget('booster.widgets.TbGridView', array(
					'dataProvider'=>$childDataProvider,
					'template'=>'{items}',
					'hideHeader'=>true,
					'emptyText'=>Rights::t('core', 'This item has no children.'),
					'htmlOptions'=>array('class'=>'grid-view parent-table mini'),
					'columns'=>array(
						array(
							'name'=>'name',
							'header'=>Rights::t('core', 'Name'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'name-column'),
							'value'=>'$data->getNameLink()',
						),
						array(
							'name'=>'type',
							'header'=>Rights::t('core', 'Type'),
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'type-column'),
							'value'=>'$data->getTypeText()',
						),
						array(
							'header'=>'&nbsp;',
							'type'=>'raw',
							'htmlOptions'=>array('class'=>'actions-column'),
							'value'=>'$data->getRemoveChildLink()',
						),
					)
				)); 
			?>

		<?php
			$this->endWidget(); 
		?>

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
			<h5>
				<?php 
					echo Rights::t('core', 'Add Child'); 
				?>
			</h5>

			<?php
				if( $childFormModel!==null ): 
			?>

					<?php 
						$this->renderPartial('_childForm', array(
							'model'=>$childFormModel,
							'itemnameSelectOptions'=>$childSelectOptions,
						)); 
					?>

			<?php
				else: 
			?>

					<p class="info">
						<?php 
							echo Rights::t('core', 'No children available to be added to this item.'); 
						?>
					</p>

			<?php 
				endif; 
			?>

		<?php
			$this->endWidget(); 
		?>

	<?php
		else:
	?>
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
				<p class="info">
					<?php echo Rights::t('core', 'No relations need to be set for the superuser role.'); ?><br />
					<?php echo Rights::t('core', 'Super users are always granted access implicitly.'); ?>
				</p>
			<?php $this->endWidget(); ?>
	<?php
		endif;
	?>

</div>