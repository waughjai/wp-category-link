<?php

require_once( 'MockWordPress.php' );

use PHPUnit\Framework\TestCase;
use WaughJ\WPCategoryLink\WPCategoryLink;

class WPCategoryLinkTest extends TestCase
{
	public function testObjectWorks() : void
	{
		$object = new WPCategoryLink( [] );
		$this->assertTrue( is_object( $object ) );
	}

	public function testCategoryLink() : void
	{
		$cat = $this->getRandomCat();
		$link = new WPCategoryLink( [ 'slug' => $cat[ 'slug' ] ] );
		$this->assertEquals( '<a href="' . $cat[ 'url' ] . '">' . $cat[ 'name' ] . '</a>', $link->getHTML() );
		$this->assertEquals( $cat[ 'url' ], $link->getURL() );
	}

	public function testCategoryLinkAltValue() : void
	{
		$cat = $this->getRandomCat();
		$link = new WPCategoryLink( [ 'slug' => $cat[ 'slug' ], 'value' => 'asfsdafs' ] );
		$this->assertEquals( '<a href="' . $cat[ 'url' ] . '">asfsdafs</a>', $link->getHTML() );
		$this->assertEquals( $cat[ 'url' ], $link->getURL() );
	}

	public function testCategoryByID() : void
	{
		$id = $this->getRandomCatNumber();
		$link = new WPCategoryLink( [ 'category_id' => $id ] );
		$this->assertEquals( '<a href="' . CATS[ $id ][ 'url' ] . '">' . CATS[ $id ][ 'name' ] . '</a>', $link->getHTML() );
		$this->assertEquals( CATS[ $id ][ 'url' ], $link->getURL() );
	}

	public function testCategoryByIDAltValue() : void
	{
		$id = $this->getRandomCatNumber();
		$link = new WPCategoryLink( [ 'category_id' => $id, 'value' => 'bxcbcxb' ] );
		$this->assertEquals( '<a href="' . CATS[ $id ][ 'url' ] . '">bxcbcxb</a>', $link->getHTML() );
		$this->assertEquals( CATS[ $id ][ 'url' ], $link->getURL() );
	}

	private function getRandomCat() : array
	{
		return CATS[ $this->getRandomCatNumber() ];
	}

	private function getRandomCatNumber() : int
	{
		return rand( 0, count( CATS ) - 1 );
	}
}
