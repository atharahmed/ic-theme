
		<footer id="page-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-3 col-xs-12">
                        <a id="footer-logo-link" href="#"></a>
                    </div>
                    <div class="col-md-7 col-sm-5 col-xs-12">
                        <ul id="menu-footer-navigation" class="menu" >
                            <li class="menu-item">©2014 <span itemprop="name">Invisible Children</span></li>
                            <li class="menu-item" itemprop="telephone">619.562.2799</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-md-offset-0 col-sm-5 col-sm-offset-6 col-xs-12 col-xs-offset-0">
                        <ul id="footer-social-links">
                            <li>
                                <a href="https://www.facebook.com/invisiblechildren" class="social-icon ic-icon-facebook" target="_blank"></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/Invisible" class="social-icon ic-icon-twitter social-icon" target="_blank"></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/+invisiblechildren/" class="social-icon ic-icon-googleplus" target="_blank"></a>
                            </li>
                            <li>
                                <a href="http://vimeo.com/invisible" class="social-icon ic-icon-vimeo" target="_blank"></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/user/invisiblechildreninc" class="social-icon ic-icon-youtube" target="_blank"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
		</footer>

        <a href="#modal" id="hidden_link" class="fancybox ie"></a>

        <!--[if lt IE 9]>
        <div id="modal">
            <div class="modal-header">
                <h6 class="header medium">
                    UH-OH!
                    <span class="subheader">Well this is awkward...</span>
                </h6>
            </div>
            <div class="modal-body">
                <div id="instructables">
                    <p>It looks like your browser is not compatible with the latest version of the Internet. You can continue but may experience some performance Issues.</p>
                    <p class="green-text">Update your browser by clicking one of the icons below</p>
                    <div class="icon-container" align="center">
                        <a href="https://www.google.com/intl/en-US/chrome/browser/" target="_blank" class="browser-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-chrome.jpg">
                        </a>
                        <a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank" class="browser-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-firefox.jpg">
                        </a>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank" class="browser-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-explorer.jpg">
                        </a>
                        <a href="http://support.apple.com/downloads/#safari" target="_blank" class="browser-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-safari.jpg">
                        </a>
                    </div>
                    <div class="center-link">
                        <a href="javascript:;" class="green-text continue-link" id="close-modal">Continue anyways</a>
                    </div>
                </div>
            </div>
        </div>
        <![endif]-->


		<?php wp_footer() ?>
        <?php ic_display_ga_code(); ?>
	</body>
</html>
