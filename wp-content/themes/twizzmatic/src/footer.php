      <footer id="main-footer">
        <div class="prefooter section">
          <div class="row grid grid-2">
            <div class="col">
              <h4 class="prefooter-title">Stay In <span>Touch</span></h4>
              <div class="social-icons">
                <?php
                $social_links = get_field("social_links");
                var_dump($social_links);

                foreach ($social_links as $link) {
                  echo $link;
                  $img = strpos("instagram", $link) ? array("src" => "icon-instagram.svg", "alt" => "TwizzMatic Instagram") : (strpos("facebook", $link) ? array("src" => "icon-facebook.svg", "alt" => "TwizzMatic Facebook") : (strpos("twitter", $link) ? array("src" => "icon-twitter.svg", "alt" => "TwizzMatic Twitter") : (strpos("youtube", $link) ? array("src" => "icon-youtube.svg", "alt" => "TwizzMatic Youtube") : "")));

                  echo '<a href="' . $link . '" target="_blank" class="icon"><img src="' . get_template_directory_uri() . '/assets/images/' . $img["src"] . '" width="30" alt="' . $img["alt"] . '"></a>';
                }
                ?>
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