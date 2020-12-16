# Api2PDF Version 2

A wrapper library to [Api2PDF 2.0](https://app.swaggerhub.com/apis-docs/api2pdf/api2pdf/2.0.0-beta#/). 

> Note: The API2PDF is currently in version beta


### Usage
```php
$apiKey = 'My_api_key';

$pdf = Api2Pdf::create($apiKey);

```

#### Chrome endpoint

```php
$pdf->chrome()->generatePdfFromUrl();
```