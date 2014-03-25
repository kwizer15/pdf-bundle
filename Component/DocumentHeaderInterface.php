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
interface DocumentHeaderInterface
{
	/**
	 * Set the author of document
	 * @param string $author
	 * @return self
	 */
	public function setAuthor($author);
	
	/**
	 * Enable or disable the document compression
	 * @param boolean $compress
	 * @return self
	 */
	public function setCompression($compress);
	
	/**
	 * Set the creator
	 * @param string $creator
	 * @return self
	 */
	public function setCreator($creator);
	
	/**
	 * Set the display mode
	 * @param string $zoom
	 * @param string $layout
	 * @return self
	 */
	public function setDisplayMode($zoom, $layout = null);
	
	/**
	 * Set keyword list
	 * @param string $keywords
	 * @return self
	 */
	public function setKeywords($keywords);
	
	/**
	 * Set margins
	 * @param float $left Margin left
	 * @param float $top Margin top
	 * @param float $right Margin right
	 * @param float $bottom Margin bottom
	 * @return self
	 */
	public function setMargins($left, $top, $right = null);
	
	/**
	 * Set the document subject
	 * @param string $subject The subject
	 */
	public function setSubject($subject);
	
	/**
	 * Set the document title
	 * @param string $title The title
	 */
	public function setTitle($title);
	
	
}