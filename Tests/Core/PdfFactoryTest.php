<?php

/*
 * This file is part of the KwizerPdfBundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\Tests\Core;

use Kwizer\PdfBundle\Core\PdfFactory;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class PdfFactoryTest extends \PHPUnit_Framework_TestCase
{
	private $document;
	
	private $factory;
	
	public function setUp()
	{
		$this->document = $this->getMock('Kwizer\PdfBundle\Core\PdfDocumentInterface');
		
		$this->factory = new PdfFactory('fpdf');
	}
	
	public function testTrue()
	{
		$this->assertTrue(true);
	}
	
	public function dataFactory()
	{
		return array(
			array('fpdf', 'Kwizer\PdfBundle\FPDF\FPDFBuilder'),
		);
	}
	
	/**
	 * 
	 * @param unknown $library
	 * @param unknown $class
	 * @dataProvider dataFactory
	 */
	public function testCreatePdfBuilder($library, $class)
	{
		$this->factory = new PdfFactory($library);
		$this->assertInstanceOf($class, $this->factory->createPdfBuilder($this->document));
	}
	
	public function testCreatePdf()
	{
		$this->document->expects($this->once())->method('buildContent');
		$this->assertInternalType('string', $this->factory->createPdf($this->document));
	}
}