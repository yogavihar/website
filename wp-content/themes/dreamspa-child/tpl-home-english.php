<?php /*
  * Template Name: Startseite english
  * Description: Layout der Startseite
  *
  * */ ?>
<?php get_header(); ?>

    <!-- ** Primary Section ** -->
    <section id="primary" class="content-full-width">

        <div id="post-109" class="post-109 page type-page status-publish hentry">
            <div id="teaser-area" class='fullwidth-section'>
                <div class="container">
                    <div class='column dt-sc-one-fourth first'>
                        <div class='dt-sc-ico-content type2'>
                            <a href='<?php echo site_url();?>/en/yoga-courses/'>
                                <div class='icon'>
                                    <span>  <img style="max-width: 60%;margin-top: 21%;color:#37251b;" src='<?php echo site_url();?>/wp-includes/images/icon-meditation.png' alt=''/>
                                        <!--img src='wp-includes/images/icon-meditation.png' alt=''/-->
                                    </span>
                                </div>
                                <h2>Yoga Classes </h2>
                                
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-fourth'>
                        <div class='dt-sc-ico-content  type2'>
                            <a href='<?php echo site_url();?>/en/consultation'>
                                <div class='icon'><span class='fa fa-leaf'> </span></div>
                                <h2>Consultation </h2>
                              
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-fourth'>
                        <div class='dt-sc-ico-content type2 '>
                            <a href='<?php echo site_url();?>/en/private-class'>
                                <div class='icon'><span class='fa fa-user'> </span></div>
                                <h2>Private Class</h2>
      
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-third'>
                        <div class='dt-sc-ico-content  type2 '>
                            <a href='<?php echo site_url();?>/en/weekly-schedule/'>
                            <div class='icon'><span class='fa fa-calendar'> </span></div>
                            <h2> Schedule </h2>
</a></div>
                    </div>
                </div>
            </div>
            <div class='fullwidth-section termine'>
                <div class="container2">
                    <div id="termine-portfolio-title" class="border-title aligncenter"><h2>Upcoming events</h2></div>
                    <div id="termine-portfolio">


                        <div class="dt-sc-gallery-container gallery with-space  isotope">

                            <?php

                            $posts = tribe_get_events(
                                 apply_filters(
                                         'tribe_events_list_widget_query_args', array(
                                                 'eventDisplay'   => 'list',
                                                 'posts_per_page' => 6
                                         )
                                 )
                            );
                               //var_dump($posts);
                            $number=0;
                            //Check if any posts were found
                            if ( $posts ) :
                            foreach ( $posts as $post ) :
                                setup_postdata( $post );
                                $custom_fields = get_post_custom();
                                    $number++;
                                    

                                    //Datum des Events
                                    $startDate=date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventStartDate", true)));
                                    $endDate=date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventEndDate", true)));
                                    if($startDate==$endDate){
                                        $event_date=$startDate;
                                    }
                                    else{
                                        $event_date=$startDate." - ".$endDate;
                                    }
                                    //Permalink für Sprache anpassen
                                    $permalink=get_the_permalink();
                                    $permalink = str_replace( '/event/','/en/event/',$permalink);
                                    
                                    ?>
                                    <div id="termine-thumbnails-<?php echo the_ID();?>"
                                         class="dt-gallery column dt-sc-one-third with-space <?php if($number==1) echo " first";?>">
                                        <a href="<?php echo($permalink);?>" title="<?php echo(get_field('title_en' ));?>">
                                        <figure>
                                            <?php  $image = get_field('thumbnail_image');
                                                echo wp_get_attachment_image( $image, 'full' );
                                                ?>
                                            
                                        </figure>
                                        </a>
                                        <div class="dt-gallery-details">
                                            <div class="dt-gallery-details-inner">
                                                <span class="timespan"><?php echo($event_date);?></span>
                                                <h5><a href="<?php echo($permalink);?>" title="<?php echo(get_field('title_en' ));?>"><?php echo(get_field('title_en' ));?></a></h5>
                                                <h6><?php echo(get_field('excerpt_en' ));?></h6>
                                            </div>
                                        </div>
                                    </div>

                               <?php endforeach; endif;?>
                        </div>


                    </div>
                    <div class='dt-sc-hr-invisible-small  '></div>
                </div>
            </div>
            <?php //echo $GLOBALS['wp_query']->request; ?>



    </section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>