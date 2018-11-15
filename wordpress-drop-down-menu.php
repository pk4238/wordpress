<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo wp_title(); ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
        <link href="<?php echo get_stylesheet_directory_uri(); ?>/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/layout.css">
         <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.css">
        <?php
        if (get_page_uri()=='freight-broker') {
           ?>
           <!-- link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/freight-broker-style.css" -->

           <?php
         } 
        ?>
        
         <?php
        if (get_page_uri()!='freight-broker') {
           ?>
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" media="screen" />
<?php
}
?>
        <!-- THE PREVIEW STYLE SHEETS, NO NEED TO LOAD IN YOUR DOM -->

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/extralayers.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/settings.css" media="screen" />
   	    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/lightbox.min.css">
        <link rel="shortcut icon" type="image/png" href="<?php echo get_option("theme_photo_about1"); ?>"/>
 
    </head>
     <style type="text/css">
     	
		     	#nav .navbar-default {
		    /* background-color: rgba(255, 255, 255, 0.59); */
		    padding: 0px;
		    border: none;
		    background: rgba(96, 96, 96, 0.4);
		    border-radius: 0px;
		}
		
		#nav .navbar-default .navbar-nav > .active > a, #nav .navbar-default .navbar-nav > li> a {
    background: none;
    font-size: 15px !important;
    line-height: 49px;
   
    line-height: 79px;
    font-weight: 600;
    text-transform: uppercase;
}
.dropdown-menu
{
	    min-width: 252px;
}
.navbar-right .dropdown-menu
{
	    padding: 0px;
	       
}
@media (min-width: 768px){

.navbar-right .dropdown-menu {
    right: -45%;
    left: auto;
}
#nav .navbar-default .navbar-nav > .active > a, #nav .navbar-default .navbar-nav > li> a,#nav .navbar-default .navbar-nav > .active > a
		{
			color: #fff;
		}
}
.dropdown-menu > li > a {
    display: block;
    padding: 10px 20px;
    border-bottom: 1px solid #f1f1f1;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333333;
    white-space: nowrap;
}
@media (max-width: 768px){

#nav .navbar-default .navbar-nav > .active > a, #nav .navbar-default .navbar-nav > li> a {

line-height: 24px;
}
	}
     </style>
    <body>
        	<header  id="nav" >
	      <nav class="navbar navbar-default  nomargin navbar-fixed-top">
	          <div class="container-fulid">
	          <!--navbar-header -->
	              <div class=" navbar-header">
	               
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	                  <span><i class="fa fa-bars"></i></span>  
	                </button>  
	                  <span class="navbar-brand"><a href="<?php echo get_site_url() ?>"><img src="http://dhruphost.com/wordpress/dhfeb2017_255/wp-content/uploads/2017/03/1870808741done.png"  class="img-responsive" width="100" alt="...."></a></span>
	              </div>
	            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">   
<?php
$menu_name = 'primary';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

?>
<ul class="nav navbar-nav  cl-effect-13">
    <?php
    $count = 0;
    $submenu = false;

    foreach( $menuitems as $item ):
        // set up title and url
        $title = $item->title;
        $link = $item->url;
$drp="";
        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ):

        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;

    ?>
    
    
    <li class="dropdown">
        <a href="<?php echo $link; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo $title; ?>
        </a>
    <?php endif; ?>
    
    
      <?php if ( $parent_id == $item->menu_item_parent ): ?>
       <?php if ( !$submenu ): $submenu = true; ?>
            <ul class="dropdown-menu">
            <?php endif; ?>
            
            <li class="">
                    <a href="<?php echo $link; ?>"  ><?php echo $title; ?></a>
                </li>
                <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
            <?php $submenu = false; endif; ?>

        <?php endif; ?>
        <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
    </li>                           
    <?php $submenu = false; endif; ?>

<?php $count++; endforeach; ?>

  </ul>

	            </div><!-- collapse -->
	          </div>
	      </nav>
 		</header>
        
        
       

