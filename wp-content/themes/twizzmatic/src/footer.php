      <section id="pre-footer">
      	<div class="row">
      		<div class="col">
      			<h4 class="prefooter-title">Stay In <span>Touch</span></h4>
      		</div>
      		<div class="col">
      			<?php echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
      		</div>
      	</div>
      </section>
      <footer class="footer">
        <p class="footer__copyright copyright">
          &copy; <?php echo date('Y'); ?> <?php _e('Copyright', 'wp-blank') ?> <?php bloginfo('name'); ?>
        </p>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
