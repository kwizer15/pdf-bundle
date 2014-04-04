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
use Kwizer\PdfBundle\Component\DocumentInterface;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBridge extends \FPDF implements PdfInterface
{
	/**
	 * The Document to build
	 * @var DocumentInterface
	 */
	private $document;
	
	/**
	 * Constructor
	 * @param PDFBuilderInterface $builder
	 */
	public function __construct(DocumentInterface $document)
	{
		$this->setDocument($document);
		parent::__construct();
	}
	
	/**
	 * Set the builder
	 * @param PdfBuilderInterface $builder
	 * @return \Kwizer\PdfBundle\Bridge\FPDFBridge
	 */
	public function setDocument(DocumentInterface $builder)
	{
		$this->document = $document;
		
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	public function Header()
	{
		$this->document->buildHeader();
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function Footer()
	{
		$this->document->buildFooter();
	
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function AcceptPageBreak()
	{
		$this->document->buildAcceptPageBreak();
		
		return $this;
	}
}