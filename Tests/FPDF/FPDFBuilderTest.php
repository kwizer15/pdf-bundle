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
	
	public function assertPreConditions()
	{
		$this->assertInstanceOf('Kwizer\PdfBundle\Core\PdfBuilderInterface', $this->builder);
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
		$this->fpdf->expects($this->once())->method('PageNo');
		$this->builder->pageNo();
	}
	
	public function testRect()
	{
		$this->fpdf->expects($this->once())->method('Rect');
		$this->builder->rect(0,0,1,1);
	}
	
	public function testSetAuthor()
	{
		$this->fpdf->expects($this->once())->method('SetAuthor');
		$this->builder->setAuthor('foo');
	}
	
	public function testSetAutoPageBreak()
	{
		$this->fpdf->expects($this->once())->method('SetAutoPageBreak');
		$this->builder->setAutoPageBreak(true);
	}
	
	public function testSetCompression()
	{
		$this->fpdf->expects($this->once())->method('SetCompression');
		$this->builder->setCompression(false);
	}
	
	public function testSetCreator()
	{
		$this->fpdf->expects($this->once())->method('SetCreator');
		$this->builder->setCreator('foo');
	}
	
	public function testSetDisplayMode()
	{
		$this->fpdf->expects($this->once())->method('SetDisplayMode');
		$this->builder->setDisplayMode(1);
	}
	
	public function testSetDrawColor()
	{
		$this->fpdf->expects($this->once())->method('SetDrawColor');
		$this->builder->setDrawColor(0);
	}
	
	public function testSetFillColor()
	{
		$this->fpdf->expects($this->once())->method('SetFillColor');
		$this->builder->setFillColor(0);
	}
	
	public function testSetKeywords()
	{
		$this->fpdf->expects($this->once())->method('SetKeywords');
		$this->builder->setKeywords('foo');
	}
	
	public function testSetLeftMargin()
	{
		$this->fpdf->expects($this->once())->method('SetLeftMargin');
		$this->builder->setLeftMargin(1);
	}
	
	public function testSetLink()
	{
		$this->fpdf->expects($this->once())->method('SetLink');
		$this->builder->setLink(1,1.5,-1);
	}
	
	public function testSetMargins()
	{
		$this->fpdf->expects($this->once())->method('SetMargins');
		$this->builder->setMargins(1,1);
	}
	
	public function testSetRightMargin()
	{
		$this->fpdf->expects($this->once())->method('SetRightMargin');
		$this->builder->setRightMargin(1);
	}
	
	public function testSetSubject()
	{
		$this->fpdf->expects($this->once())->method('SetSubject');
		$this->builder->setSubject('foo');
	}
	
	public function testSetTitle()
	{
		$this->fpdf->expects($this->once())->method('SetTitle');
		$this->builder->setTitle('foo');
	}
	
	public function testSetTopMargin()
	{
		$this->fpdf->expects($this->once())->method('SetTopMargin');
		$this->builder->setTopMargin(1);
	}
	
	public function testSetX()
	{
		$this->fpdf->expects($this->once())->method('SetX');
		$this->builder->setX(1);
	}
	
	public function testSetY()
	{
		$this->fpdf->expects($this->once())->method('SetY');
		$this->builder->setY(1);
	}
	
	public function testSetXY()
	{
		$this->fpdf->expects($this->once())->method('SetXY');
		$this->builder->setXY(1,1);
	}
	
	public function testText()
	{
		$this->fpdf->expects($this->once())->method('Text');
		$this->builder->text(1,1,'foo');
	}
	
	public function testWrite()
	{
		$this->fpdf->expects($this->once())->method('Write');
		$this->builder->write('foo');
	}
}