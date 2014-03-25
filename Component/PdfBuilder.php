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
class PdfBuilder implements PdfBuilderInterface
{
	/**
	 * The PDF on build
	 * @var PDFInterface $pdf
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
	 * {@inheritdoc}
	 */
	public function setStyle($name)
	{
		if ($this->stylesheet === null)
		{
			throw new \Exception('Stylesheet is not defined');
		}
		if (!in_array($this->stylesheet->getNames()))
		{
			throw new \Exception('Style does not exist in the stylesheet');
		}
		$this->style = $style;
		
		return $this;
	}
	
	public function setStylesheet(StylesheetInterface $stylesheet)
	{
		$this->stylesheet = $stylesheet;
	}
	
	public function printText($text)
	{
		
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