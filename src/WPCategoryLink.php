<?php

declare( strict_types = 1 );
namespace WaughJ\WPCategoryLink;

use \WaughJ\HTMLLink\HTMLLink;
use WaughJ\TestHashItem\TestHashItem;

class WPCategoryLink extends HTMLLink
{
	public function __construct( array $atts )
	{
		$category = self::GetCategoryID( $atts );
		if ( $category !== null )
		{
			$atts[ 'href' ] = get_category_link( $category->term_id );
			$atts[ 'value' ] = $atts[ 'value' ] ?? $category->title;
		}
		else
		{
			$atts[ 'href' ] = $atts[ 'href' ] ?? TestHashItem::getString( $atts, 'slug', '' );
			$atts[ 'value' ] = $atts[ 'value' ] ?? $atts[ 'href' ];
		}

		$href = $atts[ 'href' ];
		$value = $atts[ 'value' ];
		parent::__construct( $href, $value, $atts );
	}

	private static function GetCategoryID( array $atts )
	{
		$category = false;
		if ( isset( $atts[ 'slug' ] ) )
		{
			$category = get_category_by_slug( $atts[ 'slug' ] );
		}
		else if ( isset( $atts[ 'category_id' ] ) )
		{
			$category = get_category( $atts[ 'category_id' ] );
		}
		return ( $category === false ) ? null : $category;
	}
}
