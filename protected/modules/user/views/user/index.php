<?php
	$this->breadcrumbs=array(
		UserModule::t("Users"),
	);
?>

<h1>
	<?php
		echo UserModule::t("List User");
	?>
</h1>
<div class="row">
	<div class="col-md-12">
		<?php
			if(UserModule::isAdmin()) {
		?>
				<ul class="nav navbar-nav">
					<li>
						<?php
							echo CHtml::link(UserModule::t('Manage User'),array('/user/admin'));
						?>
					</li>
					<li>
						<?php
							echo CHtml::link(UserModule::t('Manage Profile Field'),array('profileField/admin'));
						?>
					</li>
				</ul><!-- actions -->
		<?php 
			}
		?>
	</div>
</div>

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

<?php
	$this->widget(
		'booster.widgets.TbGridView',
		array(
			'dataProvider'=>$dataProvider,
			'columns'=>array(
				array(
					'name' => 'username',
					'type'=>'raw',
					'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
				),
				array(
					'name' => 'createtime',
					'value' => 'date("d.m.Y H:i:s",$data->createtime)',
				),
				array(
					'name' => 'lastvisit',
					'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
				),
			),
		)
	);
?>

<?php
	$this->endWidget(); 
?>