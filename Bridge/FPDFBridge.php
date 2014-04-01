<?php

/*
 * This file is part of the Kwizer\Pdf bundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\Bridge;

use Kwizer\PdfBundle\Component\PdfInterface;
use Kwizer\PdfBundle\Component\PdfBuilderInterface;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBridge extends \FPDF
{
	/**
	 * The PDF builder
	 * @var PdfBuilderInterface
	 */
	private $builder;
	
	/**
	 * Constructor
	 * @param PDFBuilderInterface $builder
	 */
	public function __construct(PDFBuilderInterface $builder)
	{
		$this->setBuilder($builder);
		parent::__construct();
	}
	
	/**
	 * Set the builder
	 * @param PdfBuilderInterface $builder
	 * @return \Kwizer\PdfBundle\Bridge\FPDFBridge
	 */
	public function setBuilder(PdfBuilderInterface $builder)
	{
		$this->builder = $builder;
		
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function Header()
	{
		$this->builder->buildPageHeader();
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function Footer()
	{
		$this->builder->buildPageFooter();
	
		return $this;
	}
}