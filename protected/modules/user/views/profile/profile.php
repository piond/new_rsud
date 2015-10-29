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

<?php
	$box = $this->beginWidget(
		'booster.widgets.TbPanel',
		array(
			'title' => '<strong>'.UserModule::t('Your profile').'</strong>',
			// 'headerIcon' => 'th-list',
			'padContent' => false,
			// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
		)
	);
?>
<?php
    $this->widget(
        'booster.widgets.TbDetailView',
        array(
            'data' => array(
                'Username' => CHtml::encode($model->username),
                'Email' => CHtml::encode($model->email),
                'RegistrationDate' => date("d.m.Y H:i:s",$model->createtime),
                'LastVisited' => date("d.m.Y H:i:s",$model->lastvisit),
				'Status' => CHtml::encode(User::itemAlias("UserStatus",$model->status))
            ),
            'attributes' => array(
                array('name' => 'Username', 'label' => 'Username'),
                array('name' => 'Email', 'label' => 'E-mail'),
                array('name' => 'RegistrationDate', 'label' => 'Registration Date'),
				array('name' => 'LastVisited', 'label' => 'Last Visited'),
				array('name' => 'Status', 'label' => 'Status'),
            ),
        )
    );
?>

<?php
	$this->endWidget(); 
?>

<?php
	$box = $this->beginWidget(
		'booster.widgets.TbPanel',
		array(
			'title' => '<strong>Information</strong>',
			// 'headerIcon' => 'th-list',
			'padContent' => false,
			// 'htmlOptions' => array('class' => 'bootstrap-widget-table')
		)
	);
?>
	<table class="table">
		<?php 
			$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
			
			if ($profileFields) {
				foreach($profileFields as $field) {
						//echo "<pre>"; print_r($profile); die();
		?>
				<tr>
					<th>
						<?php
							echo CHtml::encode(UserModule::t($field->title));
						?>
					</th>
					<td>
						<?php
							echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname))));
						?>
					</td>
				</tr>
		<?php
				}//$profile->getAttribute($field->varname)
			}
		?>
	</table>
<?php
	$this->endWidget(); 
?>