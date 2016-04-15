<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SIKO
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="footer-info">
				<p>
					SIKO<br>
					Samvirkende Idrætsklubber i Odense<br><br>
					Stadionvej 50<br>
					5200 Odense V<br><br>
					<a href="mailto:siko@siko.dk?Subject=Kontakt%20til%20SIKO">siko@siko.dk</a><br>
					<a href="tel:66148625">66 14 86 25</a>
				</p>
			</div>
			<div class="footer-info">
				<div class="employ">
					<div class="employ-img">
						<img src="<?php bloginfo('template_directory');?>/inc/img/preben_siko.png">
					</div>
					<div class="employ-info">
						<p>Preben Rasmussen<br>Sekretariatsleder<br>
							<a href="mailto:preben@siko.dk">preben@siko.dk</a>
						</p>
					</div>
				</div>
				<div class="employ">
					<div class="employ-img">
						<img src="<?php bloginfo('template_directory');?>/inc/img/anette_siko.png">
					</div>
					<div class="employ-info">
						<p>Anette Dalgård<br>Sekretær<br>
							<a href="mailto:siko@siko.dk">siko@siko.dk</a>
						</p>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
