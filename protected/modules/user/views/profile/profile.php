<?php
	$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
	$this->breadcrumbs=array(
		UserModule::t("Profile"),
	);
?>

<!--<h2>
	<?php
		//echo UserModule::t('Your profile');
	?>
</h2>-->

<?php echo $this->renderPartial('menu'); ?>

<?php
	if(Yii::app()->user->hasFlash('profileMessage')):
?>
	<div class="alert alert-success" role="alert">
		<?php
			echo Yii::app()->user->getFlash('profileMessage');
		?>
	</div>
<?php
	endif;
?>
<div class="row">
	<div class="col-sm-4">
		<?php
			$box = $this->beginWidget(
				'booster.widgets.TbPanel',
				array(
					'title' => false,
					// 'headerIcon' => 'th-list',
					'padContent' => false,
					// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
				)
			);
		?>
			<div class="profile_heading">
				<img src="<?php echo Yii::app()->request->baseUrl.'/'.$attributes['photo']['value']; ?>" width="260.5px">
			</div>
			<div class="navigation">
				<?php
					$this->widget(
						'booster.widgets.TbMenu',
						array(
							'type' => 'list',
							'items' => array(
								array(
									'label' => 'Edit profile',
									'url' => array('edit'),
									'icon' => 'fa fa-edit fa-lg'
								),
								array(
									'label' => 'Change password',
									'url' => array('changepassword'),
									'icon' => 'fa fa-lock fa-lg'
								)
							)
						)
					);
				?>
			</div>
		<?php
			$this->endWidget(); 
		?>
	</div>
	<div class="col-sm-8">
		<?php
			$box = $this->beginWidget(
				'booster.widgets.TbPanel',
				array(
					'title' => 'Information',
					// 'headerIcon' => 'th-list',
					'padContent' => true,
					// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
				)
			);
		?>

			<table class="table">
				<?php 
					foreach($attributes as $show){
						echo '<tr>';
							echo '<th>';
								echo $show['label'];
							echo '</th>';
							echo '<td>';
								echo $show['value'];
							echo '</td>';
						echo '</tr>';
					}
				?>
			</table>
		<?php
			$this->endWidget(); 
		?>
	</div>
</div>