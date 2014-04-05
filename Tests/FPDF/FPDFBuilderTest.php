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
	
	public function testAddFont()
	{
		$this->fpdf->expects($this->once())->method('AddFont');
		$this->builder->addFont('foo');
	}
	
	public function testAddLink()
	{
		$this->fpdf->expects($this->once())->method('AddLink');
		$this->builder->addLink();
	}
	
	public function testAddPage()
	{
		$this->fpdf->expects($this->once())->method('AddPage');
		$this->builder->addPage();
	}
	
	public function testAliasNbPages()
	{
		$this->fpdf->expects($this->once())->method('AliasNbPages');
		$this->builder->aliasNbPages('L');
	}
	
	public function testCell()
	{
		$this->fpdf->expects($this->once())->method('Cell');
		$this->builder->cell('foo');
	}
	
	public function testClose()
	{
		$this->fpdf->expects($this->once())->method('Close');
		$this->builder->close();
	}
	
	public function testError()
	{
		$this->fpdf->expects($this->once())->method('Error');
		$this->builder->error('foo');
	}
	
	public function testGetStringWidth()
	{
		$this->fpdf->expects($this->once())->method('GetStringWidth');
		$this->builder->getStringWidth('foo');
	}
	
	public function testGetX()
	{
		$this->fpdf->expects($this->once())->method('GetX');
		$this->builder->getX();
	}
	
	public function testGetY()
	{
		$this->fpdf->expects($this->once())->method('GetY');
		$this->builder->getY();
	}
	
	public function testImage()
	{
		$this->fpdf->expects($this->once())->method('Image');
		$this->builder->image('foo.jpg');
	}
	
	public function testLine()
	{
		$this->fpdf->expects($this->once())->method('Line');
		$this->builder->line(0,0,1,1);
	}
	
	public function testLink()
	{
		$this->fpdf->expects($this->once())->method('Link');
		$this->builder->link(0,0,1,1,1);
	}
	
	public function testLn()
	{
		$this->fpdf->expects($this->once())->method('Ln');
		$this->builder->ln(3);
	}
	
	public function testMultiCell()
	{
		$this->fpdf->expects($this->once())->method('MultiCell');
		$this->builder->multiCell('foo');
	}
	
	public function testOutput()
	{
		$this->fpdf->expects($this->once())->method('Output');
		$this->builder->output();
	}
	
	public function testPageNo()
	{
	
	}
	
	public function testRect()
	{
	
	}
	
	public function testSetAuthor()
	{
	
	}
	
	public function testSetAutoPageBreak()
	{
	
	}
	
	public function testSetCompression()
	{
	
	}
	
	public function testSetCreator()
	{
	
	}
	
	public function testSetDisplayMode()
	{
	
	}
	
	public function testSetDrawColor()
	{
	
	}
	
	public function testSetFillColor()
	{
	
	}
	
	public function testSetKeywords()
	{
	
	}
	
	public function testSetLeftMargin()
	{
	
	}
	
	public function testSetLink()
	{
	
	}
	
	public function testSetMargins()
	{
	
	}
	
	public function testSetRightMargin()
	{
	
	}
	
	public function testSetSubject()
	{
	
	}
	
	public function testSetTitle()
	{
	
	}
	
	public function testSetTopMargin()
	{
	
	}
	
	public function testSetX()
	{
	
	}
	
	public function testSetY()
	{
	
	}
	
	public function testSetXY()
	{
	
	}
	
	public function testText()
	{
	
	}
	
	public function testWrite()
	{
	
	}
}