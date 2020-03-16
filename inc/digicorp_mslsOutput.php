<?php
/**
 * MslsOutput
 * @author Dennis Ploetner <re@lloc.de>
 * @since 0.9.8
 */

// namespace lloc\Msls;
// use lloc\Msls;
use lloc\Msls\MslsOutput;
use lloc\Msls\MslsOptions;
use lloc\Msls\MslsLink;

/**
 * Output in the frontend
 * @package Msls
 */
class Digicorp_MslsOutput extends MslsOutput {

	/**
	 * Holds the format for the output
	 * @var array $tags
	 */
	protected $tags;

	/**
	 * Creates and gets the output as an array
	 *
	 * @param int $display
	 * @param bool $filter
	 * @param bool $exists
	 *
	 * @uses MslsOptions
	 * @uses MslsLink
	 * @return array
	 */
	public function get_url( $display = 1, $filter = false, $exists = false ) {
		$arr = [];

		$blogs = $this->collection->get_filtered( $filter );
		if ( $blogs ) {
			$mydata = MslsOptions::create();
			$link   = MslsLink::create( $display );

			foreach ( $blogs as $blog ) {
				$language = $blog->get_language();

				// $link->src = $this->options->get_flag_url( $language );
				// $link->alt = $language;

				$is_current_blog = $this->collection->is_current_blog( $blog );
				if ( $is_current_blog ) {
					$url       = $mydata->get_current_link();
					// $link->txt = $blog->get_description();
				} else {
					switch_to_blog( $blog->userblog_id );

					if ( $this->is_requirements_not_fulfilled( $mydata, $exists, $language ) ) {
						restore_current_blog();
						continue;
					} else {
						$url       = $mydata->get_permalink( $language );
						$link->txt = $blog->get_description();
					}

					restore_current_blog();
				}

				// if ( has_filter( 'msls_output_get' ) ) {
				// 	/**
				// 	 * Returns HTML-link for an item of the output-arr
				// 	 * @since 0.9.8
				// 	 *
				// 	 * @param string $url
				// 	 * @param MslsLink $link
				// 	 * @param bool $is_current_blog
				// 	 */
				// 	$arr[] = ( string ) apply_filters( 'msls_output_get', $url, $link, $is_current_blog );
				// } else {
				// 	$arr[] = sprintf(
				// 		'<a href="%s" title="%s"%s>%s</a>',
				// 		$url,
				// 		$link->txt,
				// 		$is_current_blog ? ' class="current_language"' : '',
				// 		$link
				// 	);
				// }
			}
		}

		$url = str_replace( '%', '%%', $url);

		return $url;
	}

}
