<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
  <label>
		<span class="sr-only"><?php _e( "Search for", "digicorpdomain"); ?></span>
		<input type="search" class="search-field" placeholder="<?php _e( "Search the site…", "digicorpdomain"); ?>" value="" name="s" id="s" class="form-control input-lg" title="<?php _e( "Search for", "digicorpdomain"); ?>">
	</label>
  <input type="submit" id="searchsubmit" value="Search" class="btn btn-primary btn-block"/>
  <?php // TODO: change button to html5 <button> tag and translate form ?>
</form>
