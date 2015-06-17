<?php
/**
 * The template for displaying the footer.
 * Contains footer content and the closing of the
 * #main div element.
 * @package Odin
 * @since 2.2.0
 */
?>
		</div><!-- #main -->
		<?php if (is_front_page()) { ?>
		<footer class="container-fluid footer" role="contentinfo">
		<?php } else { ?>
		<footer class="container-fluid footer-int" role="contentinfo">
		<?php } ?>
			<div class="site-info container">
				<span class="col-md-3 col-sm-12 col-xs-12">privacy policy | terms of use</span>
				<span class="col-md-9 col-sm-12 col-xs-12">ATG - Associação TathagataGarbha  -  CNPJ: 17.705.692/0001-76  -  + 55 19 3327 3159  -  contato@atgbudismo.com.br</span>
			</div><!-- .site-info -->
		</footer><!-- #footer -->
	</div><!-- .container -->
	<?php wp_footer(); ?>
</body>
</html>
