<?php /*
  * Template Name: Startseite english
  * Description: Layout der Startseite
  *
  * */ ?>
<?php get_header(); ?>

    <!-- ** Primary Section ** -->
    <section id="primary" class="content-full-width">

        <div id="post-109" class="post-109 page type-page status-publish hentry">
            <div class='fullwidth-section '
                 style="padding-top:95px;padding-bottom:50px;margin-top:-35px;">
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
                                'posts_per_page' => 6
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
                                    $event_date=date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventStartDate", true)))." - ".date('d.m.Y', strtotime(get_post_meta(get_the_ID(), "_EventEndDate", true)));

                                    ?>
                                    <div id="termine-thumbnails-<?php echo the_ID();?>"
                                         class="dt-gallery column dt-sc-one-third with-space <?php if($number%4==1) echo " first";?>">
                                        <a href="<?php echo(get_the_permalink());?>" title="<?php echo(get_the_title());?>">
                                        <figure>
                                            <img src="<?php echo(get_post_meta(get_the_ID(), '_EventImage1', true));?>" width="1060" height="795">
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

                                <?php endwhile;
                            endif; ?>

                            
                        </div>


                    </div>
                    <div class='dt-sc-hr-invisible-small  '></div>
                </div>
            </div>



    </section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>