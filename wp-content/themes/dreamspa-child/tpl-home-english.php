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
                    <div class='column dt-sc-one-third first'>
                        <div class='dt-sc-ico-content type2 cyan'>
                            <a href='<?php echo site_url();?>/en/yoga'>
                                <div class='icon'>
                                    <span>  <img style="  max-width: 55%;margin-top: 21%;color:#37251b;" src='<?php echo site_url();?>/wp-includes/images/meditation.svg' alt=''/>
                                        <!--img src='wp-includes/images/icon-meditation.png' alt=''/-->
                                    </span>
                                </div>
                                <h2>Yoga Classes </h2>
                                <p>Here an overview of our classes.</p>
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-third'>
                        <div class='dt-sc-ico-content  type2 gold'>
                            <a href='<?php echo site_url();?>/en/retreats'>
                                <div class='icon'><span class='fa fa-leaf'> </span></div>
                                <h2>Retreats </h2>
                                <p>Moments of inner peace and yoga practise</p>
                            </a>
                        </div>
                    </div>
                    <div class='column dt-sc-one-third'>
                        <div class='dt-sc-ico-content  type2 electricblue'>
                            <a href='<?php echo site_url();?>/wochenplan'>
                            <div class='icon'><span class='fa fa-calendar'> </span></div>
                            <h2> Schedule </h2>

                            <p>weekly courses in our studio</p></a></div>
                    </div>
                </div>
            </div>
            <div class='fullwidth-section termine'>
                <div class="container2">
                    <div id="termine-portfolio-title" class="border-title aligncenter"><h2>Upcoming events</h2></div>
                    <div id="termine-portfolio">


                        <div class="dt-sc-gallery-container gallery with-space  isotope">

                            <?php

                            query_posts(array(
                                'post_type' => 'tribe_events',
                                'posts_per_page' => 6,
                                'meta_query'	=> array(
                                    array(
                                            'key'		=> 'title_en',
                                            'value'		=> '',
                                            'compare'           => '!='
                                    )
                                )
                                
                            ));
                            

                            if (have_posts()):
                                //echo"<pre>";
                                $number=0;
                                while (have_posts()):
                                    $number++;
                                    the_post();
                                    $custom_fields = get_post_custom();
                                    //var_dump($custom_fields);
                                    //var_dump(get_post());

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
                                            <?php if( have_rows('images') ):
                                                $rows = get_field('images' ); 
                                                $index= 0;    
                                                if(get_field('thumnail_image' ))
                                                    $index= get_field('thumnail_image' )-1;
                                      
                                                $image = $rows[$index]['image_id'];
                                                echo wp_get_attachment_image( $image, 'full' );
                                                ?>
                                            <?php endif;?>
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

                                <?php endwhile;
                            endif; ?>

                            
                        </div>


                    </div>
                    <div class='dt-sc-hr-invisible-small  '></div>
                </div>
            </div>
            <?php //echo $GLOBALS['wp_query']->request; ?>



    </section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>