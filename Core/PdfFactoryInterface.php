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
interface PdfFactoryInterface
{
	/**
	 * Create a PdfInterface since the document model
	 * @param DocumentInterface $document
	 * @return PdfInterface
	 */
	public function createPdf(DocumentInterface $document);
	
	/**
	 * Create a PdfBuilderInterface since a document model
	 * @param DocumentInterface $document
	 * @return PdfBuilderInterface
	 */
	public function createPdfBuilder(DocumentInterface $document);
}