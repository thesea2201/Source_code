<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); 

	?>
	
	<link rel="shortcut icon" href="default.ico" type="image/x-icon">
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://www.recaptcha.net/recaptcha/api.js" async defer></script>
    <title>Bien's blog</title>
	<?php
		echo $this->Html->meta('icon');
		// echo $this->Html->css('cake.generic');
	?>
		<!-- <link href="css/foundation.css" rel="stylesheet" />
	    <link href="css/header.css" rel="stylesheet" />
	    <link href="css/icon-fonts.css" rel="stylesheet" />
	    <link href="css/hover.css" rel="stylesheet" />
	    <link href="css/footer-bottom.css" rel="stylesheet" />
	    <link href="css/menu.css" rel="stylesheet" />
	    <link href="css/blog.css" rel="stylesheet" />
	    <link href="css/fonts.css" rel="stylesheet" />
	    <link href="css/color.css" rel="stylesheet" />
	    <script src="js/modernizr.js"></script> -->

		<?php
		echo $this->Html->css('foundation.min');
		echo $this->Html->css('header');
		echo $this->Html->css('icon-fonts');
		echo $this->Html->css('hover');
		echo $this->Html->css('footer-bottom');
		echo $this->Html->css('menu');
		echo $this->Html->css('blog');
		echo $this->Html->css('fonts');
		echo $this->Html->css('color');


		echo $this->Html->script('jquery');
		echo $this->Html->script('foundation.min');
		echo $this->Html->script('modernizr');



		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
	<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

	<div id="container">
		<div id="header">
			<div class="">
				<nav class="top-bar" data-topbar>
		            <ul class="title-area">
		                <!-- Title Area -->
		                <li class="name">
		                    <h1>
		                        <a href="http://cakephp-blog.local:81/">Bien's Blog
		                        </a>
		                    </h1>
		                </li>
		                <li class="toggle-topbar menu-icon">
		                    <a href="#">
		                        <span>Menu</span>
		                    </a>
		                </li>
		            </ul>

		            <div class="top-bar-section">
		                <!-- Left Nav Section -->
		                <ul class="left">
		                    <li class=" menu-icon" id="home-icon">
		                        <a href="http://cakephp-blog.local:81">
		                            <i class="icon-home"></i>
		                            <span class="name">Home</span>
		                        </a>
		                    </li>
		                    <li class=" menu-icon" id="blog-icon">
		                        <a href="http://cakephp-blog.local:81">
		                            <i class="icon-blog"></i>
		                            <span class="name">Blog</span>
		                        </a>

		                    </li>
		                    <li class=" menu-icon" id="contact-icon">
		                        <a href="http://cakephp-blog.local:81/contact">
		                            <i class="icon-contact"></i>
		                            <span class="name" >Contact</span>
		                        </a>
		                    </li>
		                </ul>

		                

		                <ul class="right">
		                    <li class=" menu-icon">
		                        <a href="https://www.facebook.com/thebien.kaito">
		                            <i class="icon-facebook"></i>
		                        </a>
		                    </li>
		                    <li class=" menu-icon">
		                        <a href="">
		                            <i class="icon-twitter"></i>
		                        </a>

		                    </li>
		                    <li class=" menu-icon">
		                        <a href="atom.xml">
		                            <i class="icon-feed"></i>
		                        </a>
		                    </li>
		                </ul>
		            </div>
		        </nav>	        
			</div>


			<div id="content">

				<?php echo $this->Flash->render(); ?>
				<div class="content-wrapper">
			        <section id="main-content">
			            <?php  echo $this->Paginator->numbers(array('first' => 'First page')); ?>
			            <!-- Main Page Content and Sidebar -->
			            
			            <div class="row">
			                

			                <?php echo $this->fetch('content'); ?>
			                <!-- End Main Content -->
			                

			                <!-- Sidebar -->

			                <aside class="large-3 columns">

			                    <div class="ui secondary vertical pointing menu">
			                        <div class="col-md-10 purple search_box">
			                            <?php
			                                echo $this->Form->create('Post', array(
			                                    'url' => 'http://cakephp-blog.local:81/posts/search',
			                                    'type' => 'get'
			                                ));
			                                echo $this->Form->input('search_key', array('between'=>'<label for="search" class="main_search">Search</label><br>','label'=>false));
			                                echo $this->Form->button('Search', array('type' => 'submit'));
			                                echo $this->Form->end();
			                            ?>
			                        </div>
			                        <!-- category -->
			                        <!-- related post -->

			                            <div class="col-md-10 purple search_box">

			                                <h5>Categories</h5>
			                                <?php
			                                    foreach ($categories as $category){
			                                ?>
			                                <div>
			                                    <div>
			                                        <a class="item active">
			                                            <?php echo $category['Category']['name'];?>
			                                            
			                                        </a>
			                                    </div>
			                                    <div>
			                                        <?php
			                                            echo $this->element(
			                                                'category_relatedposts',
			                                            array(
			                                            'categoryID' => $category['Category']['id']
			                                            )
			                                        );
			                                        ?>
			                                    </div>
			                                </div>
			                                <?php
			                                    }
			                                ?>
			                            </div>
			                        <!-- End related post -->
			                        <!-- end category -->

			                    </div>

			                    <div class="ui vertical menu">
			                        <div class="header item">
			                            <i class="icon-page"></i>
			                            Recent Posts
			                        </div>

			                        <div class="item">
			                            <a href="#"><h6>Pork Sausage News!</h6> <p>Pork sausages health benefits proved by government...</p></a>
			                        </div>
			                        <div class="item">
			                            <a href="#"><h6>More Amazing Pork Sausage News!</h6> <p>Pork sausages better than viagra...</p></a>
			                        </div>
			                    </div>

			                    <div class="ui vertical menu">
			                        <div class="header item">
			                            <i class="icon-page"></i>
			                            Popular Posts
			                        </div>
			                        <div class="item">
			                            <a href="#"><h6>Pork Sausage News!</h6> <p>Pork sausages health benefits proved by government...</p></a>
			                        </div>
			                        <div class="item">
			                            <a href="#"><h6>More Amazing Pork Sausage News!</h6> <p>Pork sausages better than viagra...</p></a>
			                        </div>
			                    </div>            
			                </aside>

			                <!-- End Sidebar -->
			            </div>

			            <!-- End Main Content and Sidebar -->
			        
			        </section>
			        <div class="page-footer-bottom">
			            <div class="row">
			                <div class="medium-4 medium-4 push-8 columns">

			                    <ul class="home-social">
			                        <li>
			                            <a href="http://www.twitter.com/" class="twitter"></a>
			                        </li>
			                        <li>
			                            <a href="http://www.facebook.com/thebien.kaito" class="facebook"></a>
			                        </li>
			                        <li>
			                            <a href="/contact" class="mail"></a>
			                        </li>
			                    </ul>
			                </div>
			                <div class="medium-8 medium-8 pull-4 columns">
			                    <ul class="site-links">
			                        <li class="name">
			                            <a href="http://cakephp-blog.local:81/">Bien's blog</a>
			                        </li>
			                        <li>
			                            <a href="http://cakephp-blog.local:81/">Home</a>
			                        </li>
			                        <li>
			                            <a href="./">Blog</a>
			                        </li>
			                        <li>
			                            <a href="./">News & Events</a>
			                        </li>
			                    </ul>
			                    <p class="copyright">© 2014 Website. All rights reserved.</p>
			                </div>
			            </div>
			        </div>
			    </div>


			</div>
			<div id="footer">
				
			</div>
		</div>
	</section>
	</div>
</body>
</html>