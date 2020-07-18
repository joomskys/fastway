<?php
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );
    $widget->add_render_attribute( 'button', 'class', 'btn text-white' );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="cms-qc-wrap">
	<div class="cms-qc-inner bg-gray p-30">
		<div class="cms-qc-heading h2 m-b25">
			<?php echo $settings['heading_text']; ?>
		</div>
		<div class="cms-qc-desc m-b25">
			<?php echo $settings['description_text']; ?>
		</div>
		<?php foreach ($settings['contact_list'] as $value): ?>
			<div class="cms-qc-list p-20 bg-white m-b30">
				<div class="row gutters-20 align-items-center">
					<div class="col-auto">
					<?php 
			        if($is_new){
			        	\Elementor\Icons_Manager::render_icon( 
			        		$value['contact_list_icon'], 
			        		[
			        			'aria-hidden' => 'true',
			        			'class'		  => 'text-30 text-accent'
			        		] 
			        	);
			        } 
			        ?>
			        </div>
			        <div class="col h5"><?php echo esc_attr($value['contact_list_title']); ?></div>
			    </div>
		    </div>      
		<?php endforeach; ?>
		<div class="cms-qc-link">
			<a <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
			    <span <?php etc_print_html($widget->get_render_attribute_string( 'btn_text' )); ?>><?php echo esc_html($settings['btn_text']); ?></span>
			</a>
		</div>
	</div>
</div>