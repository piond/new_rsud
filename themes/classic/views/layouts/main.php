<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php
				echo CHtml::encode($this->pageTitle);
			?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap_custom_navbar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap_custom_breadcrumb.css">
		<style>
			.profile_heading {
				background-color : #F5F5F5;
			}
			.navigation .nav-list li a {
				border-top : 1px solid #ccc;
				background-color : #F5F5F5;
			}
		</style>
	</head>
	<body>
	<div id="wrapper">
		<header>
			<?php
				$this->widget(
					'booster.widgets.TbNavbar',
					array(
						'brand' => CHtml::encode(Yii::app()->name),
						'fixed' => 'top',
						'fluid' => true,
						'items' => array(
							array(
								'class' => 'booster.widgets.TbMenu',
								'type' => 'navbar',
								'items' => array(
									array(
										'label' => 'Home',
										'url' => array('/site/index'),
										'active' => true
									),
									array(
										'label' => 'About',
										'url' => array('/site/page', 'view'=>'about'),
										'active' => false
									),
									array(
										'label' => 'Contact',
										'url' => array('/site/contact'),
										'active' => false
									),
									array(
										'label' => 'Login',
										'url' => array('/user/login'),
										'active' => false,
										'visible' => Yii::app()->user->isGuest
									),
									array(
										'label' => Yii::app()->user->name,
										'url' => '#',
										'visible' => !Yii::app()->user->isGuest,
										'items' => array(
											array(
												'label' => 'Profile',
												'url' => array('/user/profile')
											),
											array(
												'label' => 'Account Settings',
												'url' => array('/user/profile/edit')
											),
											array(
												'label' => 'Rights',
												'url' => array('/rights/authItem'),
												'visible' => UserModule::isAdmin()
											),
											'---',
											array(
												'label' => 'Logout',
												'url' => array('/user/logout'),
											)
										)
									),
									// array(
										// 'label' => 'Logout ('.Yii::app()->user->name.')',
										// 'url' => array('/user/logout'),
										// 'active' => false,
										// 'visible' => !Yii::app()->user->isGuest
									// )
								),
								'htmlOptions' => array(
									'class' => 'nav navbar-nav navbar-right'
								)
							)
						)
					)
				);
			?>
		</header>
		<div class="container">
			<div id="content">
			<?php
				// $this->widget(
					// 'booster.widgets.TbBreadcrumbs',
					// array(
						// 'links'=>$this->breadcrumbs,
					// )
				// );
			?>
			
			<?php
				echo $content;
			?>
			</div>
		</div>
		
		<footer>
			<div class="container">
				Copyright &copy;
				<?php
					echo date('Y');
				?>
				by RSUD Temanggung.<br/>
				All Rights Reserved.<br/>
				<?php
					echo Yii::powered();
				?>
			</div>
		</footer>
	</div>
	</body>
</html>