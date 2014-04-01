<?php

/*
 * This file is part of the Kwizer\Pdf bundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\Adaptor;

use Kwizer\PdfBundle\Component\PdfInterface;
use Kwizer\PdfBundle\Bridge\FPDFBridge;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFAdaptor implements PdfInterface
{
	private $pdf;
	
	/**
	 * Constructor
	 * @param FPDFBridge $pdf
	 */
	public function __construct(FPDFBridge $pdf)
	{
		$this->pdf = $pdf;
	}
}