<?php

/*
 * This file is part of the Kwizer\Pdf bundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Component;

use Kwizer\PdfBundle\Bridge\FPDFBridge;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBuilder implements PdfBuilderInterface
{
	/**
	 * The PDF on build
	 * @var FPDFBridge $pdf
	 */
	private $pdf;
	
	/**
	 * The stylesheet
	 * @var Stylesheet $stylesheet
	 */
	private $stylesheet;
	
	/**
	 * Name of curent style
	 * @var string
	 */
	private $style;
	
	/**
	 * {@inheritdoc}
	 */
	public function getPdf()
	{
		return $this->pdf->Output('','S');
	}
	
	/**
	 * Constructor
	 * 
	 */
	public function __construct(StylesheetInterface $stylesheet)
	{
		$this->pdf = new FPDFBridge($this);
		$this->setStylesheet($stylesheet);
		$this->_setStyle('default');
	}
	
	/**
	 * 
	 * @param unknown $name
	 * @throws \Exception
	 * @return \Kwizer\PdfBundle\Component\PdfBuilder
	 */
	protected function _setStyle($name)
	{
		$this->style = $name;
		if ($this->getStylesheet()->get($name) === null)
		{
			$this->style = 'default';
			// Setting style with library
		}
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setStylesheet(StylesheetInterface $stylesheet)
	{
		$this->stylesheet = $stylesheet;
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function printText($text)
	{
		$this->_setStyle($style);
		$this->pdf->cell(0,0,$text);
		
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setX($x)
	{
		$this->pdf->setX($x);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setY($y)
	{
		$this->pdf->setY($y);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function printImage($width = null, $height = null, $link = null)
	{
		
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function drawLine($startX, $startY, $endX, $endY)
	{
		$this->pdf->Line($startX, $startY, $endX, $endY);
		
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function enter($n = 1)
	{
		$this->pdf->ln($n * 5);
		
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function setAutoPageBreak($auto, $margin = null)
	{
		
	}

	/**
	 * {@inheritdoc}
	 */
	public function getX()
	{
		return $this->pdf->getX();
	}
	
	public function getY()
	{
		return $this->pdf->getY();
	}

	public function getPage()
	{
		return $this->pdf->Page();
	}
}