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
interface StylesheetInterface
{
	/**
	 * Add a style
	 * @param string $name
	 * @param StyleInterface $params
	 * @return self
	 */
	public function add($name, StyleInterface $style);
	
	/**
	 * Get a style
	 * @param unknownstirng $name
	 * @return StyleInterface
	 */
	public function get($name);
	
	/**
	 * Remove a style
	 * @param string $name
	 * @return self
	 */
	public function remove($name);
}