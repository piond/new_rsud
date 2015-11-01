<section>
<article>
	<hgroup>
		<h1>
			<?php
				// echo CHtml::encode($data->title);
				echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->article_id));
			?>
			<?php
				if(CHtml::encode($data->published) == 0){
					echo '<small><code>unPublished</code></small>';
				}
			?>
		</h1>
		<h6>
			<small>
			Posted by <a href=""><?php echo Yii::app()->user->name; ?></a> on <?php echo CHtml::encode($data->createdAt); ?>
			</small>
		</h6>
	</hgroup>
	
	<div>
		<?php //echo CHtml::encode($data->content); ?>
		<?php
			if(strlen($data->content) > 500){
				echo substr($data->content, 0, 500).' ...';
			}else{
				echo $data->content;
			}
		?>
	</div>
	<div class="row">
		<div class="col-md-8">
			<strong>
				Tags :
			</strong>
			<a href="">RSUD</a>, <a href="">Kesehatan</a>
		</div>
		<div class="col-md-4">
			<h6>
				<small>
					Last Updated on <?php echo CHtml::encode($data->modifiedAt); ?>
				</small>
			</h6>
		</div>
	</div>
</article>
</section>