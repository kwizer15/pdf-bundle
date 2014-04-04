<?php

/*
 * This file is part of the bundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Tests\FPDF;

use Kwizer\PdfBundle\FPDF\FPDFBridge;
use Kwizer\PdfBundle\FPDF\FPDFBuilder;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBuilderTest extends \PHPUnit_Framework_TestCase
{
	private $builder;
	
	private $fpdf;
	
	public function setUp()
	{
		$doc = $this->getMock('Kwizer\PdfBundle\Core\PdfDocumentInterface');
		$this->fpdf = $this->getMock('Kwizer\PdfBundle\FPDF\FPDFBridge', array(), array($doc));
		
		$this->builder = new FPDFBuilder($this->fpdf);
	}
	
	public function EtestCell()
	{
		$this->getMock('FPDF')->expects($this->once())->method('Cell');
		$this->builder->cell('foo');
	}
	
	public function testGetX()
	{
		$this->fpdf->expects($this->once())->method('GetX');
		$this->builder->getX();
	}
}