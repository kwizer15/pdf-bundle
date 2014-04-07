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
	 * {@inheritdoc}
	 */
	public function buildHeader() {}
	
	/**
	 * {@inheritdoc}
	 */
	public function buildFooter() {}
	
	/**
	 * {@inheritdoc}
	 */
	public function buildAcceptPageBreak()
	{
		return true;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setDefaultStylesheet() {}
	
	/**
	 * {@inheritdoc}
	 */
	public function buildContent() {}
	
	/**
	 * {@inheritdoc}
	 */
	public function setBuilder(PdfBuilderInterface $builder)
	{
		$this->builder = $builder;
		
		return $this;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function getBuilder()
	{
		return $this->builder;
	}
}