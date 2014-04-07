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

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class AbstractPdfDocumentTest extends \PHPUnit_Framework_TestCase
{
	private $document;
	
	public function setUp()
	{
		$this->document = $this->getMockForAbstractClass('Kwizer\PdfBundle\Core\AbstractPdfDocument');
	}
	
	public function assertPreConditions()
	{
		$this->assertInstanceOf('Kwizer\PdfBundle\Core\PdfDocumentInterface', $this->document);
	}
	
	public function testBuildAcceptPageBreak()
	{
		$this->assertTrue($this->document->buildAcceptPageBreak());
	}
	
	public function testSetBuilder()
	{
		$builder = $this->getMock('Kwizer\PdfBundle\Core\PdfBuilderInterface');
		$this->assertSame($this->document, $this->document->setBuilder($builder));
	}
	
	public function testGetBuilder()
	{
		$builder = $this->getMock('Kwizer\PdfBundle\Core\PdfBuilderInterface');
		$this->document->setBuilder($builder);
		$this->assertSame($builder, $this->document->getBuilder());
	}
}