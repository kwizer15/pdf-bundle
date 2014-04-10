<?php

/*
 * This file is part of the bundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\Tests\Core;

use Kwizer\PdfBundle\Core\PdfStyle;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class PdfStyleTest extends \PHPUnit_Framework_TestCase
{
	private $style;
	
	public function setUp()
	{
		$this->style = new PdfStyle();
	}
	
	public function assertPreConditions()
	{
		$this->assertInstanceOf('Kwizer\PdfBundle\Core\PdfStyleInterface', $this->style);
	}
	
	public function dataHexDec()
	{
		return array(
				array('4F6312',array(79,99,18)),
		);
	} 
	
	/**
	 * @dataProvider dataHexDec
	 */
	public function testGetTextColorRGB($hex, $dec)
	{
		$this->style->setOptionsFromArray(array('text-color'=>$hex));
		$this->assertSame($dec, $this->style->getTextColorRGB());
	}
	
	/**
	 * @expectedException Exception
	 */
	public function testGetTextColorRGBException()
	{
	    $this->style->setOptionsFromArray(array('text-color'=>'foo'));
	    $this->style->getTextColorRGB();
	}
	

	/**
	 * @dataProvider dataHexDec
	 */
	public function testGetBorderColorRGB($hex, $dec)
	{
		$this->style->setOptionsFromArray(array('border-color'=>$hex));
		$this->assertSame($dec, $this->style->getBorderColorRGB());
	}
	
	/**
	 * @dataProvider dataHexDec
	 */
	public function testGetBackgroundColorRGB($hex, $dec)
	{
		$this->style->setOptionsFromArray(array('background-color'=>$hex));
		$this->assertSame($dec, $this->style->getBackgroundColorRGB());
	}

}