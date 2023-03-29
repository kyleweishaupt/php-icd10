# PHP ICD-10 Parser

PHP library for parsing [CMS Medicare ICD-10 Codes](https://www.cms.gov/Medicare/Coding/ICD10).

## Install

Using [Composer](https://getcomposer.org/) to install:

```
composer require kyleweishaupt/php-icd10
```

## Usage

```php
use ICD10Parser\ICD10Parser;

// From ordered .txt file
$filePath = __DIR __ . "/data/icd10cm_order_2023.txt";
$orderedCodes = ICD10Parser::fromFile($filePath)->toArray();

// Get the first code in the file
$firstCode = $orderedCodes[0];
var_dump($firstCode);

// object(ICD10Parser\ICD10CodeOrdered) {
//   ["order"]=> int(1)
//   ["code"] =>string(3) "A00"
//   ["valid"] => bool(false)
//   ["shortDescription"] => string(7) "Cholera"
//   ["longDescription"] => string(7) "Cholera"
// }

// Get code with decimal as string
$code = $firstCode->codeFormatted(); // A001 -> A00.1

// Or get from string contents (in case file loaded or ephemeral, etc.)
$orderedCodes = ICD10Parser::fromString($stringContents)->toArray();

```

## Contributing

This may or may not be maintained in the future.
If you need this functionality for a production environment, I highly recommend forking the repository.

## License

This package is NOT affiliated with CMS and/or the U.S. government in any way, shape or form.
There is no warranty whatsoever and using this package is entirely at your own risk.
Any nefarious or malicious use is strictly forbidden.

Copyright (c) 2023-present, Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php).
