      <footer id="main-footer">
        <div class="prefooter section">
          <div class="row grid grid-2">
            <div class="col">
              <h4 class="prefooter-title">Stay In <span>Touch</span></h4>
              <div class="social-icons">
                <a href="https://instagram.com" target="_blank" class="icon">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-instagram.svg'; ?>" width="30" alt="TwizzMatic Instagram">
                </a>
                <a href="https://facebook.com" target="_blank" class="icon">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-facebook.svg'; ?>" width="30" alt="TwizzMatic Facebook">
                </a>
                <a href="https://twitter.com" target="_blank" class="icon">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-twitter.svg'; ?>" width="30" alt="TwizzMatic Twitter">
                </a>
                <a href="https://youtube.com" target="_blank" class="icon">
                  <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-youtube.svg'; ?>" width="30" alt="TwizzMatic Youtube">
                </a>
              </div>
            </div>
            <div class="col">
              <?php echo do_shortcode('[yikes-mailchimp form="1"]'); ?>
            </div>
          </div>
        </div>
        <div class="footer section">
          <div class="row grid grid-2">
            <div class="col">
              <?php echo do_shortcode('[menu name="Footer Menu" id="footer-menu"]'); ?>
            </div>
            <div class="col">
              <?php echo do_shortcode('[ivory-search id="45" title="Search"]'); ?>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
