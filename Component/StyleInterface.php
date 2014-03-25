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
interface StyleInterface
{
	/**
	 * Set the font
	 * @param string $font
	 * @return self
	 */
	public function setFont($font);
	
	/**
	 * Set the text size
	 * @param float $size
	 */
	public function setSize($size);
	
	/**
	 * Enable or disable italic
	 * @param boolean $italic
	 */
	public function setItalic($italic);
	
	/**
	 * Set the bold
	 * @param boolean $bold
	 */
	public function setBold($bold);
	
	/**
	 * Set the underline
	 * @param boolean $underline
	 */
	public function setUnderline($underline);
	
	/**
	 * Set the align
	 * @param string $align L = left, R = right, J = justified, C = center
	 */
	public function setAlign($align);
	
	/**
	 * Set the background color
	 * @param int $r Red
	 * @param int $g Green
	 * @param int $b Blue
	 * @return self
	 */
	public function setBackgroundColor($r, $g = null, $b = null);
	
	/**
	 * Set the text color
	 * @param int $r Red
	 * @param int $g Green
	 * @param int $b Blue
	 * @return self
	 */
	public function setColor($r, $g = null, $b = null);
	
	/**
	 * Set the border color
	 * @param int $r Red
	 * @param int $g Green
	 * @param int $b Blue
	 * @return self
	 */
	public function setBorderColor($r, $g = null, $b = null);
	
	/**
	 * Set the border
	 * @param boolean $border
	 * @return self
	 */
	public function setBorder($border);
}