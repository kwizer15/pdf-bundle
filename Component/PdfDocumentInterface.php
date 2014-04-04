<?php

/*
 * This file is part of the Kwizer\Pdf bundle package.
 *
 * (c) Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kwizer\PdfBundle\Component;

/**
 * @author Emmanuel Bernaszuk <emmanuel.bernaszuk@kw12er.com>
 */
interface PdfDocumentInterface
{	
	public function buildHeader();
	
	public function buildFooter();
	
	public function buildAcceptPageBreak();
	
	public function setDefaultStylesheet();
	
	public function buildContent();
	
	public function setBuilder(PdfBuilderInterface $builder);
	
	public function getBuilder();
}