<div class="row">
	<div class="col-md-12">
		<ul class="nav navbar-nav">
		<?php 
			if (count($list)) {
				foreach ($list as $item)
					echo "<li>".$item."</li>";
			}
		?>
			<li>
				<?php 
					echo CHtml::link(UserModule::t('List User'),array('/user')); 
				?>
			</li>
			<li>
				<?php 
					echo CHtml::link(UserModule::t('Manage User'),array('admin')); 
				?>
			</li>
			<li>
				<?php 
					echo CHtml::link(UserModule::t('Manage Profile Field'),array('profileField/admin')); 
				?>
				</li>
		</ul><!-- actions -->
	</div>
</div>