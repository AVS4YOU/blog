<?php
/**
 * The BP_Group Class
 *
 * @since      1.0.32
 * @package    RankMath
 * @subpackage RankMath\Paper
 * @author     Rank Math <support@rankmath.com>
 */

namespace RankMath\Paper;

use RankMath\Helper;

defined( 'ABSPATH' ) || exit;

/**
 * BP_Group class.
 */
class BP_Group implements IPaper {

	/**
	 * Retrieves the SEO title.
	 *
	 * @return string
	 */
	public function title() {
		return Paper::get_from_options( 'bp_group_title' );
	}

	/**
	 * Retrieves the SEO description.
	 *
	 * @return string
	 */
	public function description() {
		return Paper::get_from_options( 'bp_group_description' );
	}

	/**
	 * Retrieves the robots.
	 *
	 * @return string
	 */
	public function robots() {
		$robots = [];
		if ( Helper::get_settings( 'titles.bp_group_custom_robots' ) ) {
			$robots = Helper::get_settings( 'titles.bp_group_robots' );
		}

		return Paper::robots_combine( $robots, true );
	}

	/**
	 * Retrieves the canonical URL.
	 *
	 * @return array
	 */
	public function canonical() {
		return '';
	}

	/**
	 * Retrieves meta keywords.
	 *
	 * @return string The focus keywords.
	 */
	public function keywords() {
		return '';
	}
}
