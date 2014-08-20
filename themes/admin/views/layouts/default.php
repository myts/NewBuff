<?php require_once BASEPATH."../themes/".$myts['site_theme']."/lib/function.php";?>
<!DOCTYPE html>
<html lang="{{ language:language_alias }}">
  <head>
    <meta charset="utf-8">
    <title><?php echo $template['title'];?></title>
    <?php echo $template['metadata'];?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="<?php echo $myts['site_favicon'];?>">

    <!-- Le styles -->
    <?php 
	    $asset = new CMS_Asset();
	    $asset->add_themes_css('style.css', $myts['site_theme'], 'default');
	    $asset->add_themes_css('bootstrap.min.css', $myts['site_theme'], 'default');
		$asset->add_themes_css('bootstrap-responsive.min.css', $myts['site_theme'], 'default');	
	    echo $asset->compile_css();	    
	    
	    $asset->add_cms_js('nocms/js/jquery.js');
	    $asset->add_cms_js("bootstrap/js/bootstrap.min.js");
	    $asset->add_themes_js('script.js', $myts['site_theme'], 'default');
	    echo $asset->compile_js(TRUE);	    
	?>
	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $myts['site_favicon'];?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()."themes/".$myts['site_theme']."/assets/default/";?>ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()."themes/".$myts['site_theme']."/assets/default/";?>ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()."themes/".$myts['site_theme']."/assets/default/";?>ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()."themes/".$myts['site_theme']."/assets/default/";?>ico/apple-touch-icon-57-precomposed.png">
    <?php flush(); ?>
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
      	<div class="container-fluid">
			<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">
				<img src ="<?php echo $myts['site_logo'];?>" style="max-height:20px; max-width:20px;" />          	
			</a>          
			<div class="nav-collapse in collapse" id="main-menu" style="height: auto; ">
				<?php echo build_quicklink($myts['quicklinks'], $myts['navigations']);?>
			</div>
        </div>       
      </div>
    </div>
    
    <div class="container">
      <div class="row-fluid">
    	<div id="layout-banner" class="well hidden-phone span12">
        	<div class="span2">
        		<img src ="<?php echo $myts['site_logo'];?>"" /> 
        	</div>        	
            <div class="span10">
	            <h1><?php echo $myts['site_name'];?></h1>
	            <p><?php echo $myts['site_slogan'];?></p>
            </div>	                       
        </div> 	    
    	<div id="layout-content" class="span9">
    		<div><?php echo build_menu_path($myts['navigation_path']); ?></div>
    		<hr />
            <?php echo $template['body'];?>
            <div class="clear"></div>
            <?php flush(); ?>
        </div><!--/#layout-content-->       
        <div id="layout-widget" class="span2">		        	
            <h4>WIDGET</h4><hr />
            <?php //echo build_widget_html($myts['widget'], 'sidebar');?>
            <h4>ADVERTISEMENT</h4><hr />
            <?php //echo build_widget_html($myts['widget'], 'advertisement');?>
            <?php flush(); ?>	            
        </div><!--/#layout-widget--> 
              
      </div><!--/row-->
      <hr>
      <footer>
        <?php echo $myts['site_footer'];?>
      </footer>
    </div><!--/.fluid-container-->
    
    
    
  </body>
</html>

