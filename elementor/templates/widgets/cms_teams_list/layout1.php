<?php
$dir = $widget->get_setting('dir', 'ltr');
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-teams-list-inner',
    'dir' => $dir,
] );

$slides_to_show = $widget->get_setting('slides_to_show', '');
$slides_to_show_tablet = $widget->get_setting('slides_to_show_tablet', '');
$slides_to_show_mobile = $widget->get_setting('slides_to_show_mobile', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', '');
$slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', '');

$slidesToShow = !empty($slides_to_show)?$slides_to_show:3;
$isSingleSlide = 1 === $slidesToShow;
$defaultLGDevicesSlidesCount = $isSingleSlide ? 1 : 2;
$slidesToShowTablet = !empty($slides_to_show_tablet)?$slides_to_show_tablet:$defaultLGDevicesSlidesCount;
$slidesToShowMobile = !empty($slides_to_show_mobile)?$slides_to_show_mobile:1;
if($isSingleSlide){
    $slidesToScroll = 1;
}
else{
    $slidesToScroll = !empty($slides_to_scroll)?$slides_to_scroll:$defaultLGDevicesSlidesCount;
}
$slidesToScrollTablet = !empty($slides_to_scroll_tablet)?$slides_to_scroll_tablet:$defaultLGDevicesSlidesCount;
$slidesToScrollMobile = !empty($slides_to_scroll_mobile)?$slides_to_scroll_mobile:1;

$arrows = $widget->get_setting('arrows', 'true');
$dots = $widget->get_setting('dots', 'true');
$pause_on_hover = $widget->get_setting('pause_on_hover', 'true');
$autoplay = $widget->get_setting('autoplay', 'true');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', 'true');
$speed = $widget->get_setting('speed', '500');
$widget->add_render_attribute( 'carousel', [
    'class' => 'cms-slick-carousel',
    'data-dir' => $dir,
    'data-arrows' => $arrows,
    'data-dots' => $dots,
    'data-pauseOnHover' => $pause_on_hover,
    'data-autoplay' => $autoplay,
    'data-autoplaySpeed' => $autoplay_speed,
    'data-infinite' => $infinite,
    'data-speed' => $speed,
    'data-slidesToShow' => $slidesToShow,
    'data-slidesToShowTablet' => $slidesToShowTablet,
    'data-slidesToShowMobile' => $slidesToShowMobile,
    'data-slidesToScroll' => $slidesToScroll,
    'data-slidesToScrollTablet' => $slidesToScrollTablet,
    'data-slidesToScrollMobile' => $slidesToScrollMobile,
] );
?>
<?php if(isset($settings['teams']) && !empty($settings['teams']) && count($settings['teams'])): ?>
    <div class="cms-teams-list-wrapper cms-slick-slider">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['teams'] as $team): ?>
                        <div class="cms-team-wrapper">
                            <div class="team-image">
                                <?php
                                if(!empty($team['team_image']['id'])){
                                    echo wp_get_attachment_image($team['team_image']['id']);
                                }
                                else{
                                    ?>
                                    <img src="<?php echo esc_url($team['team_image']['url']); ?>" alt="<?php echo esc_html($team['team_name']); ?>">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="team-meta">
                                <?php
                                    $url = !empty($team['team_link']['id'])?$team['team_link']['id']:'#';
                                    $target = !empty($team['team_link']['is_external']);
                                    $rel = !empty($team['team_link']['nofollow']);
                                ?>
                                <a href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?> class="team-name"><?php echo esc_html($team['team_name'])?></a>
                                -
                                <span class="team-job"><?php echo esc_html($team['team_job'])?></span>
                            </div>
                            <div class="team-desc">
                                <?php echo wp_kses_post($team['team_desc']); ?>
                            </div>
                            <div class="team-social">
                                <?php
                                    $social_target = $team['team_social_new_window'] == 'true';
                                    $social_nofollow = $team['team_social_nofollow'] == 'true';
                                    $facebook = !empty($team['team_link_facebook'])?$team['team_link_facebook']:'#';
                                    $twitter = !empty($team['team_link_twitter'])?$team['team_link_twitter']:'#';
                                    $linkedin = !empty($team['team_link_linkedin'])?$team['team_link_linkedin']:'#';
                                    $instagram = !empty($team['team_link_instagram'])?$team['team_link_instagram']:'#';
                                    $skype = !empty($team['team_link_skype'])?$team['team_link_skype']:'#';
                                ?>
                                <a href="<?php echo esc_url($facebook); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo esc_url($twitter); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo esc_url($linkedin); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo esc_url($instagram); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                                <a href="<?php echo esc_url($skype); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                    <i class="fa fa-skype" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
