<?php

/*
 * This file is part of the bundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Component;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPdfBuilder implements PdfBuilderInterface
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
		return $this->pdf;
	}
	
	/**
	 * Constructor
	 * 
	 */
	public function __construct(StylesheetInterface $stylesheet)
	{
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
		}
		
		return $this;
	}
	
	public function setStylesheet(StylesheetInterface $stylesheet)
	{
		$this->stylesheet = $stylesheet;
	}
	
	public function printText($text)
	{
		$this->_setStyle($style);
		$this->pdf->cell(0,0,$text);
	}

	public function setX($x)
	{
		
	}
	
	public function setY($y)
	{
		
	}
	
	public function printImage($width = null, $height = null, $link = null)
	{
		
	}
	
	public function drawLine($startX, $startY, $endX, $endY)
	{
		
	}

	public function enter($n = 1)
	{
		
	}

	public function setAutoPageBreak($auto, $margin = null)
	{
		
	}

	public function getX()
	{
		
	}
	
	public function getY()
	{
		
	}

	public function getPage()
	{
		
	}
}