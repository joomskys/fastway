<?php
$dir = $widget->get_setting('dir', 'ltr'); 
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-teams-list-inner',
    'dir' => $dir,
] );


// team image size
$team_image_size            = $widget->get_setting('team_image_size','full');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension');
if($team_image_size != 'custom'){
    $img_size = $team_image_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else{
    $img_size = 'full';
}

?>
<?php if(isset($settings['teams']) && !empty($settings['teams']) && count($settings['teams'])): ?>
    <div class="cms-teams-list-wrapper cms-teams-layout2">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php fastway_slick_slider_settings($widget); ?>>
                <?php foreach ($settings['teams'] as $team): ?>
                        <div class="cms-team-item overflow">
                            <div class="cms-team-item-inner relative">
                                <?php
                                    fastway_image_by_size([
                                        'id'      => $team['team_image']['id'], 
                                        'size'    => $img_size,
                                        'class'   => 'team-img',
                                        'default' => true,
                                        'before'  => '<div class="team-image">',
                                        'after'   => '</div>'
                                    ]);
                                ?>
                                <div class="team-meta text-center p-30 bg-black-08 absolute cms-transition">
                                    <?php
                                        $url    = !empty($team['team_link']['id'])?$team['team_link']['id']:'#';
                                        $target = !empty($team['team_link']['is_external']);
                                        $rel    = !empty($team['team_link']['nofollow']);
                                    ?>
                                    <div class="team-name h4 m-t0 m-b20 text-white">
                                        <a href="<?php echo esc_url($url); ?>" <?php etc_print_html($target?'target="_blank"':''); ?> <?php etc_print_html($rel?'rel="nofollow"':''); ?> class="team-name"><?php echo esc_html($team['team_name'])?></a>
                                    </div>
                                    <div class="team-job m-b20 text-white"><?php echo esc_html($team['team_job'])?></div>
                                    <?php if(!empty($team['team_desc'])): ?>
                                        <div class="team-desc m-b20 text-white">
                                            <?php echo wp_kses_post($team['team_desc']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="team-social cms-transition social-icons social-square text-accent link-accent link-hover-white">
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
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo esc_url($twitter); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo esc_url($linkedin); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo esc_url($instagram); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                        </a>
                                        <a href="<?php echo esc_url($skype); ?>" <?php etc_print_html($social_target?'target="_blank"':''); ?> <?php etc_print_html($social_nofollow?'rel="nofollow"':''); ?>>
                                            <i class="fab fa-skype" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif;