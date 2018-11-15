Wordpress Theme : http://demo.athemes.com/ignis/
Pagination Example : dhjuly2017_060
https://codex.wordpress.org/Class_Reference/WP_Query

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<!-- SAME AS -->
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		// Post Content here
	}
} 
?>

<!-- Class Reference/WP Query -->
<?php
$the_query = new WP_Query( $args ); //Parameters

if ( $the_query->have_posts() ) {  //Methods and Properties
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . get_the_title() . '</li>';
	}
	echo '</ul>';
	wp_reset_postdata();
} else {
	// no posts found
}
?>

<!-- 
1-	Author Parameters : $query = new WP_Query( array( 'author_name' => 'rami' ) );
2-	Category Parameters : $query = new WP_Query( array( 'category_name' => 'staff' ) );
3-	Tag Parameters : $query = new WP_Query( array( 'tag_id' => 13 ) );
4-	Taxonomy Parameters : $query = new WP_Query( array( 'taxonomy' => 'actor' ) );
5-	Search Parameter : $query = new WP_Query( array( 'pagename' => 'contact' ) );
6-	Password Parameters : $query = new WP_Query( array( 'has_password' => true ) );
7-	Type Parameters : query = new WP_Query( array( 'post_status' => 'draft' ) );
8-	Status Parameters : $query = new WP_Query( array( 'post_status' => 'draft' ) );
9-	Pagination Parameters : $query = new WP_Query( array( 'posts_per_page' => 3 ) );
10-	Order & Orderby Parameters :  
		$args = array(
			'orderby' => 'menu_order title',
			'order'   => 'DESC',
		);
		$query = new WP_Query( $args );

	Show Popular Posts
	$args = array(
		'orderby' => 'comment_count'
	);
	$query = new WP_Query( $args );

11-	Date Parameters : $query = new WP_Query( 'year=2012&monthnum=12&day=12' );
		$args = array(
			'date_query' => array(
				array(
					'year'  => 2012,
					'month' => 12,
					'day'   => 12,
				),
			),
		);
		$query = new WP_Query( $args );

	Return posts between 9AM to 5PM on weekdaysc:
		$args = array(
			'date_query' => array(
				array(
					'hour'      => 9,
					'compare'   => '>=',
				),
				array(
					'hour'      => 17,
					'compare'   => '<=',
				),
				array(
					'dayofweek' => array( 2, 6 ),
					'compare'   => 'BETWEEN',
				),
			),
			'posts_per_page' => -1,
		);
		$query = new WP_Query( $args );

12-	Custom Field Parameters : $query = new WP_Query( array( 'meta_key' => 'color' ) );
-->




<!-- Slug to post id -->
<?php
$post = get_page_by_path( 'marcus-productions', OBJECT, 'post' ) ;
$id = $post->ID; 
?>


<!-- Post fetch by slug -->
<?php
$args = array(  
  	'post_type' => 'produto', 
  	'posts_per_page' => -1, 
  	'tax_query' => array(
    array(
        	'taxonomy' => 'produto_category',
        	'field'    => 'slug', // term_id, slug  
        	'terms'    => 'taeq',
    	),
   	)
);
?>

<!-- get uri segment in wordpress -->
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
echo $uri_segments[4];
?>


<!-- Repeater Loop  WORDPRESS LANDING pAGE 255 pROJECT   D:\Prakash\Backup\255 -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	if(get_field('get_started_content')): 
		while(the_repeater_field('get_started_content')): 
			//if image get_sub_field['image']; echo $image['url'];
	?>
	  <li> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>  <?php the_sub_field('content'); ?></li>
	<?php 
			endwhile; 
		endif; 
	endwhile; 
endif; 
?>

<!-- wo-admin logo change -->
<!-- Change Login logo  -->
function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png);  //Add your own logo image in this url 
padding-bottom: 10px; 
} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
?>


<!-- Custom Post Get -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php 
	    $banner = get_field('person_name'); 
	    $additional_title = get_field('additional_text');
	    $what_we_are_title = get_field('what_we_are_title'); 
	    $what_we_are_content = get_field('what_we_are_content'); 
	    $what_we_are_image = get_field('what_we_are_image'); 
	    $work_with_us_title = get_field('work_with_us_title'); 
	    $work_with_us_content = get_field('work_with_us_content'); 
	    $work_with_us_image = get_field('work_with_us_image'); 
	    $get_started_image = get_field('get_started_image');
    ?>
<?php endwhile; endif; ?>




<!-- Simple loop -->
<?php
	$args = array( 'post_type' => 'freight_broker', 'posts_per_page' => 2, 'order' => 'ASC' );
	$loop = new WP_Query( $args );
	$i=0;
	while ( $loop->have_posts() ) : $loop->the_post();
?>

<?php  $i++; endwhile; ?>




<!-- Fetch Data According Condition -->
<?php
	//$abc = 'home_slider';
	//$categories = get_terms($abc);
	//print_r($categories);

	$args = array('post_type' => 'landing_service', 'order'=>'ASC', 'tax_query' => array( array('taxonomy' => 'landing_service','field' => 'id','terms' => 79 )));
	$loop = new WP_Query( $args );
	$i=0;
	while ( $loop->have_posts() ) : $loop->the_post();
		if($i%3==0){
			echo '<div class="row servicebox-5">';
		}
?>                          


<?php
	$i++;
	if($i%3==0)
	{
		echo '</div>';
	}	
endwhile;
?> 

<!-- fetch post from category slug -->
<?php
$loop = new WP_Query( array('post_type'=>'product', 'order'=>'ASC','tax_query' => array(array('taxonomy' => 'product','field' => 'slug','terms' => $slug ))
		));
while ( $loop->have_posts() ) : $loop->the_post();
$i++; endwhile;
?>

<!-- get category name using category slug -->
<?php
$cat = get_term_by( 'slug', $slug, 'product');
echo $cat->name;     
?>

<!-- Get post category -->
<?php
$args = array(
    'type' => 'post'
    ) 
    ;
$categories = get_categories( $args );
print_r($categories);
?>

<?php
$arg = array( 'type' => 'portfolio', 'orderby' => 'name', 'order' => 'ASC', 'taxonomy' => 'portfolio');
$categorie = get_categories($arg);  
print_r($categorie);
?>

<!-- get image for custom post categories ACF -->
<?php 
$arg = array( 'type' => 'portfolio', 'orderby' => 'name', 'order' => 'ASC', 'taxonomy' => 'portfolio');
$categorie = get_categories($arg);  
foreach($categorie as $cat) {
	$taxonomy = $cat->taxonomy;
    $term_id = $cat->term_id; 
  	$slug =  $taxonomy . '_' . $term_id; 
  	$img = get_field('image',$slug);
  	//$img['url'];
}	
?>


<!-- default post / portfolio filter -->
<?php
    $arg = array( 'type' => 'post', 'orderby' => 'name', 'order' => 'ASC');
    $categorie = get_categories($arg);  
    foreach ($categorie as $cat) : 
?>
	<?php echo $cat->slug; ?>
<?php endforeach; ?>

<!-- Default post fetch according conditions -->
<?php
    $arg = array( 'post_type' => 'post', 'orderby' => 'name', 'order' => 'ASC');
    $categorie = get_categories($arg);  
    foreach ($categorie as $cat) :
        $catId = $cat->term_id;    
        $args = array('cat' => $catId, 'order' => 'ASC', 'post_status' => 'publish');
        $loop = new WP_Query( $args );   
	    while ( $loop->have_posts() ) : $loop->the_post();  
	    ?>
	    <?php echo strtoupper(get_the_title()); ?>
	    <?php
    endwhile;
endforeach;
?> 


<!-- get simple menu -->
<?php 
    $menuLocations = get_nav_menu_locations();   
    $menuID = $menuLocations['main_menu'];
    $primaryNav = wp_get_nav_menu_items($menuID);   
    $i=1;
    foreach ($primaryNav as $navItem) {
    ?>
    <li><a href="<?php echo $navItem->url; ?>" ><?php echo $navItem->title; ?></a></li>
    <?php $i++; } ?>
	<li class="visible-xs">
	  <div class="search_box">
	    <input type="text" class="search_top" >
	  </div>
	</li>                    
</ul> 

<!-- Multiple dropdown menu -->
<?php
    $i=1;
    $menu_name = 'main_menu';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
?>
<ul class="nav navbar-nav">
      <?php $count = 0; $submenu = false;
      foreach( $menuitems as $item ):
        $title = $item->title;
        $link = $item->url;
        $drp="";
        if ( !$item->menu_item_parent ):
          $parent_id = $item->ID;
        ?>
        <li class="dropdown" >
          <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
        <?php endif; ?>
        
        <?php if ( $parent_id == $item->menu_item_parent ): ?>
          <?php if ( !$submenu ): $submenu = true; ?>
            <ul class="dropdown-menu">
              <?php endif; ?>
                <li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
              <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
            </ul>
            <?php $submenu = false; endif; ?>
            <?php endif; ?>
            <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
        </li>
    <?php $submenu = false; endif; ?>
    <?php $i++; $count++; endforeach; ?>  
</ul>


<!-- Search Form -->
<form role="search" method="get" id="searchform" class="search-form" action="<?php echo get_site_url(); ?>">           
    <div class="form-group">
        <div class="input-group">
            <input type="search" name="s" class="search_top" onblur="if (this.value == '') {this.value = 'Enter a keyword';}" onfocus="if (this.value == 'Enter a keyword') {this.value = '';}">
    	</div>
	</div>
</form>



<!-- Fetch Textarea From Theme Setting -->
<?php 
echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));  
echo get_stylesheet_directory_uri(); 
echo html_entity_decode(stripslashes(get_option('theme_description_banner'))); 
echo get_option("theme_below_contact_photo_about");

//Fetch Data From Post [fields]
echo get_post_meta( get_the_ID(), 'Cart_heading', true ); 

//Anchor Tag
echo the_permalink(); 
echo get_site_url();

$content = get_the_excerpt(); 
echo substr($content,0,50); 

?>


<!-- Get content from one page and show it on another page -->
<?php
$your_query = new WP_Query( 'pagename=about-us' );
while ( $your_query->have_posts() ) : $your_query->the_post();
the_content();
endwhile;
wp_reset_postdata();
?>

 
https://becoz.in/articles/wordpress/wordpress-get-category-name-of-custom-post-type-in-wordpress-loop/