<?php

/*
 * This file is part of the KwizerPdfBundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Component;

use Kwizer\PdfBundle\Core\PdfBuilderInterface;
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
	 * Name of curent style
	 * @var array
	 */
	private $styles = array();
	
	/**
	 * {@inheritdoc}
	 */
	public function getPdf()
	{
		return $this->output();
	}
	
	/**
	 * Constructor
	 * 
	 */
	public function __construct(PdfInterface $pdf)
	{
		$this->pdf = $pdf;
		$this->addStyle('default');
		$this->_setStyle('default');
	}
	
	/**
	 * 
	 * @param string $name
	 * @throws \Exception
	 * @return \Kwizer\PdfBundle\Component\PdfBuilder
	 */
	protected function _selectStyle($name)
	{
		$this->styleName = !array_key_exists($name, $this->styles) ? 'default' : $name;
		// Fonctions font etc...
		$style = $this->styles[$this->styleName];
		$fontStyle = '';
		$fontStyle.= $style->isFontItalic() ? 'I' : '';
		$fontStyle.= $style->isFontBold() ? 'B' : '';
		$fontStyle.= $style->isFontUnderline() ? 'U' : '';
		$this->pdf->SetFont($style->getFontName(), $fontStyle, $style->getFontSize());
		list($r, $g, $b) = $style->getTextColorRGB();
		$this->pdf->SetTextColor($r, $g, $b);
		
		return $style;
	}
	
	/**
	 * Add a style
	 * @param string $name
	 * @param array $options
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function addStyle($name, $options = array())
	{
		$this->styles[$name] = self::createStyle($options);
		
		return $this;
	}
	
	/**
	 * StyleInterface Factory
	 * @param array $options
	 * @return \Kwizer\PdfBundle\Component\FPDFStyle
	 */
	public static function createStyle($options = array())
	{
		return new FPDFStyle($options);
	}
	
	/**
	 * Add a font
	 * @param string $family
	 * @param string $style
	 * @param string $file
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function addFont($family, $style = '', $file = '')
	{
		$this->pdf->AddFont($family, $style, $file);
		
		return $this;
	}
	
	/**
	 * Return a link id
	 * @return int
	 */
	public function addLink()
	{
		return $this->pdf->AddLink();
	}
	
	/**
	 * Add a new page
	 * @param string $orientation
	 * @param string|array $size
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function addPage($orientation = '', $size = '')
	{
		$this->pdf->addPage($orientation, $size);
		
		return $this;
	}
	
	/**
	 * Define the alias for total pages number
	 * @param string $alias
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function aliasNbPages($alias = '{{{nb}}}')
	{
		$this->pdf->aliasNbPages($alias);
		
		return $this;
	}
	
	/**
	 * Print a cell from the defined style
	 * @param string $txt The text to print
	 * @param string $styleName The name of the style used
	 * @param string|int $link A link or a link id
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function cell($txt='', $styleName = null, $link='')
	{
		$style = $this->_selectStyle($styleName);
		
		$this->pdf->Cell(
				$style->getDivWidth(),
				$style->getFontHeight(),
				utf8_decode($txt),
				$style->getBorder(),
				2,
				$style->getAlign(),
				$style->getFill(),
				$link
		);
		
		return $this;
	}
	
	/**
	 * Close the document
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function close()
	{
		$this->pdf->Close();
		
		return $this;
	}
	
	/**
	 * Fatal error
	 * @param string $msg
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function error($msg)
	{
		$this->pdf->Error($msg);
		
		return $this;
	}
	
	/**
	 * Return width of string in the selected font
	 * @param string $s
	 * @return float
	 */
	public function getStringWidth($s)
	{
		return $this->pdf->GetStringWidth($s);
	}
	
	/**
	 * Return the current X position
	 * @return float
	 */
	public function getX()
	{
		return $this->pdf->getX();
	}
	
	/**
	 * Return the current Y position
	 * @return float
	 */
	public function getY()
	{
		return $this->pdf->getY();
	}
	
	/**
	 * Place an image
	 * @param string $file
	 * @param float $x
	 * @param float $y
	 * @param float $w
	 * @param float $h
	 * @param string $type
	 * @param mixed $link
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */	
	public function image($file, $x = null, $y = null, $w = 0, $h = 0, $type = '', $link = '')
	{
		$this->pdf->Image($file, $x, $y, $w, $h, $type, $link);
		
		return $this;
	}
	
	/**
	 * Draw a line
	 * @param float $x1
	 * @param float $y1
	 * @param float $x2
	 * @param float $y2
	 * @param float $width
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function line($x1, $y1, $x2, $y2, $width = 0.2)
	{
		$this->pdf->SetLineWidth($width);
		$this->pdf->Line($x1, $y1, $x2, $y2);
		
		return $this;
	}
	
	/**
	 * Place a link
	 * @param float $x
	 * @param float $y
	 * @param float $w
	 * @param float $h
	 * @param mixed $link
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function link($x, $y, $w, $h, $link)
	{
		$this->pdf->Link($x, $y, $w, $h, $link);
		
		return $this;
	}
	
	/**
	 * New line
	 * @param float $h
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function ln($h = null)
	{
		$this->pdf->ln($h);
		
		return $this;
	}
	
	/**
	 * Print text with new lines
	 * @param string $txt
	 * @param string $styleName
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function multiCell($txt='', $styleName = null)
	{
		$style = $this->_selectStyle($styleName);
		$this->pdf->MultiCell(
				$style->getDivWidth(),
				$style->getFontHeight(),
				utf8_decode($txt),
				$style->getBorder(),
				$style->getAlign(),
				$style->getFill()
		);
		
		return $this;
	}

	/**
	 * Get the document string
	 * @param string $name
	 * @param string $dest
	 * @return string
	 */
	public function output()
	{
		return $this->pdf->Output('', 'S');
	}
	
	/**
	 * Get the current page number
	 * @return int
	 */
	public function pageNo()
	{
		return $this->pdf->PageNo();
	}
	
	/**
	 * Draw a rectangle
	 * @param float $x
	 * @param float $y
	 * @param float $w
	 * @param float $h
	 * @param float $border The border width
	 * @param boolean $fill The rectangle is fill
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function rect($x, $y, $w, $h, $border = 0.2, $fill = false)
	{
		$style = '';
		if ($border > 0)
		{
			$this->pdf->SetLineWidth($border);
			$style.= 'D';
		}
		$style.= ($fill == true) ? 'F' : '';
		
		$this->pdf->rect($x, $y, $w, $h, $style);
		
		return $this;
	}
	
	/**
	 * Set the author of document
	 * @param string $author
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setAuthor($author, $isUTF8 = true)
	{
		$this->pdf->SetAuthor($author, $isUTF8);
		
		return $this;
	}
	
	/**
	 * Enable or disable the auto page break
	 * @param boolean $auto
	 * @param float|null $margin
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setAutoPageBreak($auto, $margin = null)
	{
		$this->pdf->SetAutoPageBreak($auto, $margin);
		
		return $this;
	}

	/**
	 * Enable or disable zlib compression
	 * @param boolean $compress
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setCompression($compress)
	{
		$this->pdf->SetCompression($compress);
		
		return $this;
	}
	
	/**
	 * Set the creator
	 * @param string $creator
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setCreator($creator, $isUTF8 = true)
	{
		$this->pdf->SetCreator($creator, $isUTF8);
		
		return $this;
	}
	
	/**
	 * Set the display mode
	 * @param mixed $zoom
	 * @param string $layout
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setDisplayMode($zoom, $layout = 'default')
	{
		$this->pdf->SetDisplayMode($zoom, $layout);
		
		return $this;
	}
	
	/**
	 * Set the draw color
	 * @param int $r
	 * @param int $g
	 * @param int $b
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setDrawColor($r, $g = null, $b = null)
	{
		$this->pdf->SetDrawColor($r, $g, $b);
		
		return $this;
	}
	
	/**
	 * Set the fill color
	 * @param int $r
	 * @param int $g
	 * @param int $b
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setFillColor($r, $g = null, $b = null)
	{
		$this->pdf->SetFillColor($r, $g, $b);
		
		return $this;
	}
	
	/**
	 * Set the keywords
	 * @param string $keywords
	 * @param boolean $isUTF8
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setKeywords($keywords, $isUTF8 = true)
	{
		$this->pdf->SetKeywords($keywords, $isUTF8);
		
		return $this;
	}
	
	/**
	 * Set the left margin
	 * @param float $margin
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setLeftMargin($margin)
	{
		$this->pdf->SetLeftMargin($margin);
		
		return $this;
	}

	/**
	 * 
	 * @param int $link Link ID (see addLink)
	 * @param float $y The position in the page
	 * @param int $page The page number (-1 is the current page)
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setLink($link, $y = 0, $page = -1)
	{
		$this->pdf->SetLink($link, $y, $page);
		
		return $this;
	}
	
	/**
	 * Set the margins
	 * @param float $left
	 * @param float $top
	 * @param float $right
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setMargins($left, $top, $right = null)
	{
		$this->pdf->SetMargins($left, $top, $right);
		
		return $this;
	}
	
	/**
	 * Set the right margin
	 * @param float $margin
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setRightMargin($margin)
	{
		$this->pdf->SetRightMargin($margin);
		
		return $this;
	}
	
	/**
	 * Set the subject
	 * @param string $subject
	 * @param boolean $isUTF8
	 */
	public function setSubject($subject, $isUTF8 = true)
	{
		$this->pdf->SetSubject($subject, $isUTF8);
		
		return $this;
	}
	
	/**
	 * Set the document title
	 * @param string $title
	 * @param boolean $isUTF8
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setTitle($title, $isUTF8 = true)
	{
		$this->pdf->SetTitle($title, $isUTF8);
		
		return $this;
	}
	
	/**
	 * Set the top margin
	 * @param float $margin
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setTopMargin($margin)
	{
		$this->pdf->SetTopMargin($margin);
		
		return $this;
	}
	
	/**
	 * Set the X position
	 * @param float $x
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setX($x)
	{
		$this->pdf->setX($x);
		
		return $this;
	}
	
	/**
	 * Set the Y position
	 * @param float $y
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setY($y)
	{
		$this->pdf->setY($y);

		return $this;
	}
	
	/**
	 * Set the X and Y positions
	 * @param float $y
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function setXY($x, $y)
	{
		$this->pdf->setXY($x, $y);
		
		return $this;
	}
	
	/**
	 * Print a text (no border, no fill)
	 * @param float $x
	 * @param float $y
	 * @param string $txt
	 * @param string $styleName
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function text($x, $y, $txt, $styleName = null)
	{
		$style = $this->_selectStyle($styleName);
		$this->pdf->text($x, $y, $txt);
		
		return $this;
	}
	
	/**
	 * Write text flow
	 * @param string $txt
	 * @param string $styleName
	 * @param string $link
	 * @return \Kwizer\PdfBundle\Component\FPDFBuilder
	 */
	public function write($txt, $styleName = null, $link = '')
	{
		$style = $this->_selectStyle($styleName);
		$this->pdf->write($style->getFontHeight(), $txt, $link);
		
		return $this;
	}
	

}