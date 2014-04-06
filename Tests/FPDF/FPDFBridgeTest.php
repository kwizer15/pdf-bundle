<?php

/*
 * This file is part of the KwizerPdfBundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Tests\FPDF;

use Kwizer\PdfBundle\FPDF\FPDFBridge;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBridgeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * 
	 * @var FDPFBridge $bridge
	 */
	private $bridge;
	
	/**
	 * 
	 * @var Kwizer\PdfBundle\Core\PdfDocumentInterface $document
	 */
	private $document;
	
	/**
	 * {@inheritdoc}
	 */
	public function setUp()
	{
		$this->document = $this->getMock('Kwizer\PdfBundle\Core\PdfDocumentInterface');
		
		$this->bridge = new FPDFBridge($this->document);
	}
	
	public function assertPreConditions()
	{
		$this->assertInstanceOf('fpdf\FPDF', $this->bridge);
	}
	
	public function testHeader()
	{
		$this->document->expects($this->once())->method('buildHeader');
		$this->bridge->Header();
	}
	
	public function testFooter()
	{
		$this->document->expects($this->once())->method('buildFooter');
		$this->bridge->Footer();
	}
	
	public function testAcceptPageBreak()
	{
		$this->document->expects($this->once())->method('buildAcceptPageBreak');
		$this->bridge->AcceptPageBreak();
	}
}