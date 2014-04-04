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
abstract class AbstractPdfDocument implements PdfDocumentInterface
{	
	/**
	 * Format the header
	 */
	public function buildHeader() {}
	
	/**
	 * Format the footer
	 */
	public function buildFooter() {}
	
	/**
	 * Logic from accept page document
	 * @return boolean
	 */
	public function buildAcceptPageBreak() { return true; }
	
	/**
	 * Set the stylesheet
	 * @return array
	 */
	public function setDefaultStylesheet() {}
	
	/**
	 * Format the content (main function)
	 */
	public function buildContent() {}
	
	/**
	 * Set the builder
	 * @param PdfBuilderInterface $builder
	 * @return self
	 */
	public function setBuilder(PdfBuilderInterface $builder)
	{
		$this->builder = $builder;
	}
	
	/**
	 * Get the builder
	 * @return PdfBuilderInterface
	 */
	public function getBuilder()
	{
		return $this->builder;
	}
}