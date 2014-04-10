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
class PdfFactory implements PdfFactoryInterface
{
	private $builderClass;
	
	private $bridgeClass;
	
	public function __construct($library)
	{
		switch ($library)
		{
			default:
				$this->builderClass = '\Kwizer\PdfBundle\FPDF\FPDFBuilder';
				$this->bridgeClass = '\Kwizer\PdfBundle\FPDF\FPDFBridge';
		}
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function createPdf(PdfDocumentInterface $document)
	{
		return $this->createPdfBuilder($document)->getPdf();
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function createPdfBuilder(PdfDocumentInterface $document)
	{
		$builder = new $this->builderClass(new $this->bridgeClass($document));
		$document->setDefaultStylesheet();
		$document->setBuilder($builder);
		$document->buildContent();
		
		return $builder;
	}
}