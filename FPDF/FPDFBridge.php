<?php

/*
 * This file is part of the KwizerPdfBundle package.
*
* (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Kwizer\PdfBundle\FPDF;

use fpdf\FPDF as FPDF;
use Kwizer\PdfBundle\Core\PdfInterface;
use Kwizer\PdfBundle\Core\PdfDocumentInterface;
/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
class FPDFBridge extends FPDF implements PdfInterface
{
	/**
	 * The Document to build
	 * @var DocumentInterface
	 */
	private $document;
	
	/**
	 * Info producer
	 * @var string
	 */
	private $producer = 'FPDF KwizerPdfBundle';
	
	/**
	 * Constructor
	 * @param PDFBuilderInterface $builder
	 */
	public function __construct(PdfDocumentInterface $document)
	{
		$this->setDocument($document);
		parent::__construct();
	}
	
	/**
	 * Set the builder
	 * @param PdfBuilderInterface $builder
	 * @return \Kwizer\PdfBundle\Bridge\FPDFBridge
	 */
	public function setDocument(PdfDocumentInterface $document)
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
	
	/**
	 * {@inheritdoc}
	 */
	public function _putinfo()
	{
		$this->_out('/Producer '.$this->_textstring($this->producer));
		if(!empty($this->title))
			$this->_out('/Title '.$this->_textstring($this->title));
		if(!empty($this->subject))
			$this->_out('/Subject '.$this->_textstring($this->subject));
		if(!empty($this->author))
			$this->_out('/Author '.$this->_textstring($this->author));
		if(!empty($this->keywords))
			$this->_out('/Keywords '.$this->_textstring($this->keywords));
		if(!empty($this->creator))
			$this->_out('/Creator '.$this->_textstring($this->creator));
		$this->_out('/CreationDate '.$this->_textstring('D:'.@date('YmdHis')));
	}
}