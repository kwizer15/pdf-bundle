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
interface PdfBuilderInterface
{
	/**
	 * Return the pdf
	 * @return string
	 */
	public function getPdf();
	
	/**
	 * Select a style of the stylesheet for the next print
	 * @param string $name
	 * @param array options
	 * @return self
	 */
	public function addStyle($name, $options = array());
	
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
	 * Get X postion
	 * @return float
	 */
	public function getX();
	
	/**
	 * Get Y position
	 * @return float
	 */
	public function getY();
	
	

}