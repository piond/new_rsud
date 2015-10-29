<div class="row">
	<div class="col-md-12">
		<ul class="nav navbar-nav">
			<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin')); ?></li>
			<li><?php echo CHtml::link(UserModule::t('Manage Profile Field'),array('admin')); ?></li>
		<?php 
			if (isset($list)) {
				foreach ($list as $item)
					echo "<li>".$item."</li>";
			}
		?>
		</ul><!-- actions -->
	</div>
</div>