<?php

/*
 * This file is part of the KwizerPdfBundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\FPDF;

use Kwizer\PdfBundle\Core\PdfStyleInterface;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFStyle implements PdfStyleInterface
{
	private $font = 'courier';
	
	private $fontSize = 12;
	
	private $italic = false;
	
	private $bold = false;
	
	private $underline = false;
	
	private $padding = 0;
	
	private $textColor = '000000';
	
	private $backgroundColor = '000000';
	
	private $align = 'left';
	
	private $borderSize = 0;
	
	private $borderColor = '000000';
	
	public function __construct($options = array())
	{
		$this->setOptionsFromArray($options);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getDivWidth()
	{
		return ($this->fontSize + $this->padding)/2;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getFontHeight()
	{
		return $this->fontSize;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getFontName()
	{
		return $this->font;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function isFontItalic()
	{
		return $this->italic;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function isFontBold()
	{
		return $this->bold;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function isFontUnderline()
	{
		return $this->underline;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getFontSize()
	{
		return $this->fontSize;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getTextColorRGB()
	{
		return $this->_convertColorToRGB($this->textColor);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getBorderColorRGB()
	{
		return $this->_convertColorToRGB($this->borderColor);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getBackgroundColorRGB()
	{
		return $this->_convertColorToRGB($this->backgroundColor);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getBorder()
	{
		return $this->borderSize;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getAlign()
	{
		return $this->align;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getFill()
	{
		return $this->backgroundColor !== null;
	}
	
	public function setOptionsFromArray($options = array())
	{
		foreach($options as $key=>$option)
		{
			switch ($key)
			{
				case 'font':
					$this->font = (string)$option;
					break;
				case 'font-size':
					$this->fontSize = (int)$option;
					break;
				case 'italic':
					$this->italic = (bool)$option;
					break;
				case 'bold':
					$this->bold = (bool)$option;
					break;
				case 'underline':
					$this->underline = (bool)$option;
					break;
				case 'padding':
					$this->padding = (int)$option;
					break;
				case 'text-color':
					$this->textColor = (string)$option;
					break;
				case 'background-color':
					$this->backgroundColor = (string)$option;
					break;
				case 'align':
					$this->align = (string)$option;
					break;
				case 'border-color':
					$this->borderColor = (string)$option;
					break;
				case 'border-size':
					$this->borderSize = (int)$option;
					break;
				default:
			}
		}
	}
	
	private function _convertColorToRGB($color)
	{
		$color = str_replace('#','',$color);
		$rgbhex = str_split($color,2);
		foreach ($rgbhex as $u)
		{
			$rgb[] =  hexdec($u);
		}
		return $rgb;
	}
}