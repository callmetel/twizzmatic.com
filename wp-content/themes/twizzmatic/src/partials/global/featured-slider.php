<section id="featured-slider-wrapper">
    <div class="row">
        <div class="col">
            <?php 
                // Check if has featured slides
                $slides = get_field('featured_content');
                $slide_counter = 0;

                if( have_rows('featured_content') ): ?>
                <div id="featured-slider" class="slider">
                    <div class="slider-inner">
                    <?php while( have_rows('featured_content') ): the_row(); 
                        $slide_counter++;
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $link  = get_sub_field('link');
                        $link_url = $link['url'];
                        $link_title = $link['title'];

                        if($link_title == null || $link_title == '') {
                            $link_title = 'Learn More';
                        };

                        if($slide_counter == 1) {
                            $active_class = 'active';
                        };
                        
                        ?>
                        <div class="featured-slide <?php echo $active_class; ?>" data-slide="<?php echo $slide_counter; ?>">
                            <h2 class="slider-title"><?php echo $title; ?></h2>
                            <div class="slider-image" style="background-image:url('<?php echo $image; ?>')"></div>
                            <a href="<?php echo $link_url; ?>" class="slider-link"><?php echo $link_title; ?></a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <div class="slider-indicators">
                        <?php 
                            $slide_counter = 0;
                            foreach($slides as $slide):
                                $slide_counter++;
                                if($slide_counter == 1) {
                                    $active_class = 'active';
                                };
                                echo '<a class="slider-indicator '.$active_class.'" data-slide="'.$slide_counter.'"></a>';
                            endforeach;
                        ?>
                    </div>
                    <div class="slider-controls">
                        <a class="slider-control prev"></a>
                        <a class="slider-control next"></a>
                    </div>
                </div>
            <?php endif; ?>  
        </div>
    </div>  
</section>
