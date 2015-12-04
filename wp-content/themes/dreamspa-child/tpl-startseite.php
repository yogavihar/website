<?php /*
  * Template Name: Startseite
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
                        <div class='dt-sc-ico-content  type2 '>
                            <a href='<?php echo site_url();?>/yoga/yoga-kurse/'>
                                <div class='icon'>
                                    <span>  <img style="max-width: 60%;margin-top: 21%;color:#37251b;" src='<?php echo site_url();?>/wp-includes/images/icon-meditation.png' alt=''/>
                                        <!--img src='wp-includes/images/icon-meditation.png' alt=''/-->
                                    </span>
                                </div>
                                <h2>Spezialkurse</h2>
                               
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-fourth'>
                        <div class='dt-sc-ico-content type2'>
                            <a href='<?php echo site_url();?>/beratung'>
                                <div class='icon'><span class='fa fa-leaf'> </span></div>
                                <h2>Beratung</h2>
                                
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-fourth'>
                        <div class='dt-sc-ico-content type2 '>
                            <a href='<?php echo site_url();?>/privatunterricht'>
                                <div class='icon'><span class='fa fa-user'> </span></div>
                                <h2>Privatklasse</h2>
                            
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-fourth'>
                        <div class='dt-sc-ico-content type2'>
                            <a href='<?php echo site_url();?>/wochenplan'>
                            <div class='icon'><span class='fa fa-calendar'> </span></div>
                            <h2> Wochenplan </h2>
                            
                            </a></div>
                    </div>
                </div>
            </div>
            <div class='fullwidth-section termine'>
                <div class="container2">
                    <div id="termine-portfolio-title" class="border-title aligncenter"><h2>Aktuelle Termine</h2></div>
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
                                //echo(get_the_title()."<br>");
                                
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
                                    ?>
                                    <div id="termine-thumbnails-<?php echo the_ID();?>"
                                         class="dt-gallery column dt-sc-one-third with-space <?php if($number==1) echo " first";?>">
                                        <a href="<?php echo(get_the_permalink());?>" title="<?php echo(get_the_title());?>">
                                        <figure>
                                            <?php 
                           
                                                $image = get_field('thumbnail_image');
                                                //var_dump($image);
                                                echo wp_get_attachment_image( $image, 'full' );
                                                ?>
                                      
                                        </figure>
                                        </a>
                                        <div class="dt-gallery-details">
                                            <div class="dt-gallery-details-inner">
                                                <span class="timespan"><?php echo($event_date);?></span>
                                                <h5><a href="<?php echo(get_the_permalink());?>" title="<?php echo(get_the_title());?>"><?php echo(get_the_title());?></a></h5>
                                                <h6><?php echo(get_the_excerpt());?></h6>
                                            </div>
                                        </div>
                                    </div>
                     
                           <?php endforeach; endif;?>
                            
                                                   
                        </div>


                    </div>
                    <div class='dt-sc-hr-invisible-small  '></div>
                </div>
            </div>



    </section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>