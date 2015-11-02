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
		$form=$this->beginWidget(
			'booster.widgets.TbActiveForm',
			array(
				'id'=>'article-form',
				'enableAjaxValidation'=>false,
			)
		);
	?>

		<div class="alert alert-info">
			Fields with <span class="required">*</span> are required.
		</div>

		<?php
			echo $form->errorSummary($model);
		?>
			
			<div class="row">
				<div class="col-md-10">
					<?php
						echo $form->textFieldGroup(
							$model,
							'title',
							array(
								'widgetOptions' => array(
									'htmlOptions' => array(
									)
								)
							)
						);
					?>
				</div>

				<div class="col-md-2">
					<?php
						echo $form->switchGroup(
							$model,
							'published',
							array(
								'widgetOptions' => array(
									'options' => array(
										'size' => 'small',
										'onText' => 'Yes',
										'offText' => 'No',
										'onColor' => 'success',
										'offColor' => 'default'
									),
									'events' => array(
										'switchChange' => 'js:function(event, state) {
												console.log(this);
												console.log(event);
												console.log(state);
											}'
									)
								)
							)
						);
					?>
				</div>
			</div>

			<?php 
				echo $form->ckEditorGroup(
					$model,
					'content',
					array(
						'wrapperHtmlOptions' => array(
							/* 'class' => 'col-sm-5', */
						),
						'widgetOptions' => array(
							'editorOptions' => array(
								'fullpage' => 'js:true',
								/* 'width' => '640', */
								/* 'resize_maxWidth' => '640', */
								/* 'resize_minWidth' => '320'*/
							)
						)
					)
				);
			?>
				
			<?php
				echo $form->dropDownListGroup(
					$model,
					'category_id',
					array(
						'wrapperHtmlOptions' => array(
							// 'class' => 'col-sm-5'
						),
						'widgetOptions' => array(
							'data' => $category_list
						)
					)
				);
			?>
			
			<?php
				$tags = Tags::model()->findAll(array('order'=>'tag'));
				foreach($tags as $tag){
					$arrTags[] = $tag->tag;
				}
				
				echo $form->select2Group(
					$model,
					'tags',
					array(
						'wrapperHtmlOptions' => array(
							// 'class' => 'col-sm-5',
						),
						'widgetOptions' => array(
							'asDropDownList' => false,
							'options' => array(
								'tags' => $arrTags,
								// 'placeholder' => 'type clever, or is, or just type!',
								/* 'width' => '40%', */
								'tokenSeparators' => array(',', ' ')
							)
						)
					)
				);
			?>

		<div class="form-actions text-right">
			<?php
				$this->widget(
					'booster.widgets.TbButton', array(
						'buttonType'=>'submit',
						'context'=>'primary',
						'label'=>$model->isNewRecord ? 'Create' : 'Save',
					)
				);
			?>
		</div>

	<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>