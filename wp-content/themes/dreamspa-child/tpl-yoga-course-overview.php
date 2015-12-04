<?php /*Template Name: Yoga Courses Overview Template*/?>
<?php get_header();?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="content-full-width">
            <div class='fullwidth-section termine'>
                <div class="container2">
                    <div id="termine-portfolio-title" class="border-title aligncenter"><h2><?php _e( 'Special Yoga courses', 'tribe-events-calendar' ) ?></h2></div>
                    <div id="termine-portfolio">

                        <div class="dt-sc-gallery-container gallery with-space  isotope">

<?php
$curr_lang=get_locale();
$today = date('Y-m-d');
$posts = tribe_get_events(
     apply_filters(
             'tribe_events_list_widget_query_args', array('posts_per_page'=>30)
     )
);
                               
if ( $posts ) :
     $number=0;
    foreach ( $posts as $post ) :
        setup_postdata( $post );
        $custom_fields = get_post_custom();
        
        //nur Kategorie Retreat
        if(!tribe_event_in_category("kurse"))
            continue;
        $number++;
        
         //nicht zurückliegende events
        if(strtotime(get_post_meta(get_the_ID(), "_EventStartDate", true)) < strtotime('today'))
            continue;
                    
        //echo(get_the_title()."<br>");
        
        $event_link=esc_url( tribe_get_event_link() );

        if($curr_lang=="en_GB"){
            if(get_field('title_en' )=="") continue;
            $title=get_field('title_en' );
            $event_link = str_replace( '/event/','/en/event/',$event_link);
            $excerpt=get_field('excerpt_en' );
        }
        else if($curr_lang=="es_ES"){
            if (get_field('title_es' )=="")  continue;
            $title=get_field('title_es' );
            $event_link = str_replace( '/event/','/es/event/',$event_link);
            $excerpt=get_field('excerpt_es' );
        }
        else{
            $title="";
                //den Custom Title holen
                $custom_fields = get_post_custom();
               while( have_rows('courses_') ): the_row();
                if(get_sub_field('title')):
                   $title=get_sub_field('title');
                 endif;
             endwhile;

            if(!$title)
                $title=get_the_title();
            $excerpt=get_the_excerpt();
        }
        //Datum des Events
        $event_date=date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventStartDate", true)))." - ".date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventEndDate", true)));?>
        <div id="termine-thumbnails-<?php echo the_ID();?>"
                    class="dt-gallery column dt-sc-one-third with-space <?php if($number==1) echo " first";?>">
                   <a href="<?php echo(get_the_permalink());?>" title="<?php echo(get_the_title());?>">
                   <figure>
                       <?php  $image = get_field('thumbnail_image');
                           echo wp_get_attachment_image( $image, 'full' );
                           ?>

                   </figure>
                   </a>
                   <div class="dt-gallery-details">
                       <div class="dt-gallery-details-inner">
                           <span class="timespan"><?php echo($event_date);?></span>
                           <h5><a href="<?php echo($event_link);?>" title="<?php echo($title);?>"><?php echo($title);?></a></h5>
                           <h6><?php echo($excerpt);?></h6>
                       </div>
                   </div>
               </div>
     <?php endforeach; endif; ?>
         
                        </div>


                    </div>
                    <div class='dt-sc-hr-invisible-small  '></div>
                </div>
            </div>
                </div>
	</section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>