<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

	<input type="hidden" name="post_type[]" value="post" />
	<input type="hidden" name="post_type[]" value="ariana-services" />
	<input type="hidden" name="post_type[]" value="ariana-projects" />

	<label>
		<span class="sr-only"><?php _e( "Search for", "digicorpdomain"); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( "Search the site…", "digicorpdomain"); ?>" value="" name="s" title="<?php _e( "Search for", "digicorpdomain"); ?>">
	</label>
	<button type="submit" class="search-submit">
    <svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <path d="m32 29.7243549-2.2756451 2.2756451-8.4782882-8.4782882c-2.2957835 1.7923222-5.1151668 2.7791063-8.0956576 2.7791063-3.50409066 0-6.80679677-1.3694147-9.3039648-3.8464443-2.47702957-2.4770296-3.8464443-5.7797357-3.8464443-9.3039647 0-3.52422911 1.36941473-6.82693522 3.8464443-9.3039648 2.49716803-2.47702957 5.79987414-3.8464443 9.3039648-3.8464443 3.524229 0 6.8269351 1.36941473 9.3039647 3.8464443 2.4971681 2.47702958 3.8665828 5.77973569 3.8665828 9.3039648 0 2.9804908-1.0069226 5.7998741-2.7992448 8.0956576zm-25.89804909-9.5456261c1.89301448 1.8930144 4.39018249 2.9200755 7.04845819 2.9200755 2.6582756 0 5.1554436-1.0270611 7.0484581-2.9200755 1.872876-1.8728761 2.8999371-4.3700441 2.8999371-7.0283197 0-2.6582757-1.0270611-5.15544371-2.8999371-7.04845819-1.8930145-1.87287602-4.3901825-2.89993706-7.0484581-2.89993706-2.6582757 0-5.15544371 1.02706104-7.02831974 2.89993706-1.89301447 1.89301448-2.92007551 4.39018249-2.92007551 7.04845819 0 2.6582756 1.02706104 5.1554436 2.89993706 7.0283197z">
      </path>
    </svg>
    <span class="sr-only"><?php _e( "Submit", "digicorpdomain"); ?></span>
  </button>
</form>
