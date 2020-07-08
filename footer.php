<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package FastWay
 */ 
$back_totop_on = fastway_get_opt('back_totop_on', true);
?>
	</div><!-- #content inner -->
</div><!-- #content -->

<?php fastway_footer(); ?>
<?php fastway_search_popup(); ?>
<?php fastway_sidebar_hidden(); ?>
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
    <a href="#" class="scroll-top"><i class="zmdi zmdi-long-arrow-up"></i></a>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
