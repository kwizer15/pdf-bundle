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
interface PdfInterface
{
	/**
	 * Get the output
	 * 
	 * @return string
	 */
	public function output();
}