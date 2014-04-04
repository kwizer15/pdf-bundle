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
	/**
	 * {@inheritdoc}
	 */
	public function createPdf(DocumentInterface $document)
	{
		$this->createPdfBuilder($document)->getPdf();
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function createPdfBuilder(DocumentInterface $document)
	{
		$builder = new PdfBuilder;
		$document->buildPdf($builder);
		
		return $builder;
	}
}