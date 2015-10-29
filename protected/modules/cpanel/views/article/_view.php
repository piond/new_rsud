<section>
<article>
	<hgroup>
		<h1>
			<?php
				// echo CHtml::encode($data->title);
				echo ' '.CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id));
			?>
			<?php
				if(CHtml::encode($data->published) == 0){
					echo '<small><code>unPublished</code></small>';
				}
			?>
		</h1>
		<h6>
			Posted by <a href=""><?php echo Yii::app()->user->name; ?></a> on <?php echo CHtml::encode($data->createdAt); ?>
		</h6>
	</hgroup>
	
	<p>
		<?php echo CHtml::encode($data->content); ?>
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
				Last Updated on <?php echo CHtml::encode($data->modifiedAt); ?>
			</small>
		</div>
	</div>
</article>
</section>