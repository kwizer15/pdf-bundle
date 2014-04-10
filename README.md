pdf-bundle
==========

[![Build Status](https://travis-ci.org/kwizer15/pdf-bundle.svg?branch=master)](https://travis-ci.org/kwizer15/pdf-bundle)

## Installation

1. Install KwizerPdfBundle
2. Enable the bundle

### Install KwizerPdfBundle

Add the following dependency to your composer.json file:
``` json
{
    "require": {
        "kwizer15/pdf-bundle": "1.0.*"
    }
}
```

Update vendors

``` bash
$ php composer.phar update
```

### Enable the bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Kwizer\PdfBundle\KwizerPdfBundle(),
    );
}
```

## Using the bundle

### Hello World

#### The document

``` php
<?php
// src/Your/Bundle/PdfDocument/MyPdf.php

namespace Your\Bundle\PdfDocument;

class MyPdf extends Kwizer\PdfBundle\Core\AbstractPdfDocument
{
	public function buildContent()
	{
		$this->builder->cell('Hello World !!!');
	}
}
```

#### Controller

``` php
<?php
// src/Your/Bundle/Controller/MyController.php

...
use Symfony\Component\HttpFoundation\Response;

class MyController extends Controller
{
	public function myAction()
	{
		$response = new Response();
		$response->headers->set('Content-Type', 'application/pdf');
		$response->headers->set('Content-Disposition', 'inline; filename=my.pdf');
		$pdf = $this->get('pdf.factory')->createPdf(new MyDocument());
		$response->setContent($pdf);
	
		return $response;
	}
}
```