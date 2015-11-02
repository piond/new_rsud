<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				echo CHtml::encode($this->pageTitle);
			?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css">
	</head>
	<body>
		<div class="container">
			<?php
				echo $content;
			?>
		</div>
	</body>
</html>