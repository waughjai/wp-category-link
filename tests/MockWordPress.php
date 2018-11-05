<?php

	const CATS =
	[
		[ 'name' => 'Food', 'slug' => 'food', 'url' => 'https://www.food.com' ],
		[ 'name' => 'Clothing', 'slug' => 'clothing', 'url' => 'https://www.clothing.com' ]
	];

	function get_category_by_slug( $slug )
	{
		$number_of_cats = count( CATS );
		for ( $i = 0; $i < $number_of_cats; $i++ )
		{
			if ( $slug === CATS[ $i ][ 'slug' ] )
			{
				return get_category( $i );
			}
		}
		return null;
	}

	function get_category_link( int $category_id )
	{
		return CATS[ $category_id ][ 'url' ];
	}

	function get_category( int $category_id )
	{
		return ( object )([ 'term_id' => $category_id, 'title' => CATS[ $category_id ][ 'name' ] ]);
	}
