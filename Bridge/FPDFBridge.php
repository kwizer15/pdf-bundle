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
use Kwizer\PdfBundle\Component\DocumentInterface;
use Kwizer\PdfBundle\Component\PdfBuilderInterface;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBridge extends \FPDF
{
	/**
	 * The document to build
	 * @var DocumentInterface
	 */
	private $document;
	
	/**
	 * The PDF builder
	 * @var PdfBuilderInterface
	 */
	private $builder;
	
	/**
	 * Constructor
	 * @param PDFBuilderInterface $builder
	 * @param DocumentInterface $document
	 */
	public function __construct(PDFBuilderInterface $builder, DocumentInterface $document)
	{
		$this->setBuilder($builder);
		$this->setDocument($document);
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
	 * Set the document
	 * @param DocumentInterface $document
	 * @return \Kwizer\PdfBundle\Bridge\FPDFBridge
	 */
	public function setDocument(DocumentInterface $document)
	{
		$this->document = $document;
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function Header()
	{
		$document->buildPageHeader($this->builder);
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function Footer()
	{
		$document->buildPageFooter($this->builder);
	
		return $this;
	}
}