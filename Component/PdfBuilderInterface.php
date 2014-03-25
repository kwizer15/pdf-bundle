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

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
interface PdfBuilderInterface
{
	/**
	 * Return the pdf
	 * @return PdfInterface
	 */
	public function getPdf();
	
	/**
	 * Select a style of the stylesheet for the next print
	 * @param string $name
	 * @return self
	 */
	public function setStyle($name);
	
	/**
	 * Select a style of the stylesheet for the next print
	 * @param string $name
	 * @return self
	 */
	public function setStylesheet(StylesheetInterface $stylesheet);
	
	/**
	 * Print a text
	 * @param string $text
	 * @return self
	 */
	public function printText($text);
	
	/**
	 * Set X position
	 * @param float $x The X position
	 * @return self
	 */
	public function setX($x);
	
	/**
	 * Set Y position
	 * @param float $y The Y position
	 * @return self
	 */
	public function setY($y);
	
	/**
	 * Print an image
	 * @param float $width Width of the image
	 * @param float $height Height of the image
	 * @param string $link Link
	 * @return self 
	 */
	public function printImage($width = null, $height = null, $link = null);
	
	/**
	 * Draw a line
	 * @param float $startX Start X postion
	 * @param float $startY Start Y postion
	 * @param float $endX End X postion
	 * @param float $endY End Y postion
	 * @return self
	 */
	public function drawLine($startX, $startY, $endX, $endY);
	
	/**
	 * Carriage return
	 * @param int $n Number of enter
	 * @return self
	 */
	public function enter($n = 1);
	
	/**
	 * Set the break page
	 * @param boolean $auto Enable (true) or disable (false)
	 * @param float $margin Margin to break
	 */
	public function setAutoPageBreak($auto, $margin = null);
	
	/**
	 * Get X postion
	 * @return float
	 */
	public function getX();
	
	/**
	 * Get Y position
	 * @return float
	 */
	public function getY();
	
	/**
	 * Get the page number
	 * @return int
	 */
	public function getPage();

}