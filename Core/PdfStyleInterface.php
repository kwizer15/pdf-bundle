<?php

/*
 * This file is part of the KwizerPdfBundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\Core;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
interface PdfStyleInterface
{
	public function getDivWidth();
	
	public function getFontHeight();
	
	public function getFontName();
	
	public function isFontItalic();
	
	public function isFontBold();
	
	public function isFontUnderline();
	
	public function getFontSize();
	
	public function getTextColorRGB();
	
	public function getBorderColorRGB();
	
	public function getBackgroundColorRGB();
	
	public function getBorder();
	
	public function getAlign();
	
	public function getFill(); 
}