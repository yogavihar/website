<?php /*Template Name: Retreats Template*/?>
<?php get_header();?>

	<!-- ** Primary Section ** -->
	<section id="primary" class="content-full-width">
            <div class='fullwidth-section termine'>
                <div class="container2">
                    <div id="termine-portfolio-title" class="border-title aligncenter"><h2>Aktuelle Retreats</h2></div>
                    <div id="termine-portfolio">

                        <div class="dt-sc-gallery-container gallery with-space  isotope">

                            <?php

                            query_posts(array(
                                'term' => 'retreat',
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
                </div>
	</section><!-- ** Primary Section End ** -->
<?php get_footer(); ?>