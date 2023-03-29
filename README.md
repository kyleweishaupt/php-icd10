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

ICD10Parser::parse("file_path.csv");
```

## Contributing

This may or may not be maintained in the future.

If you need this functionality for a production environment, I highly recommend forking the repository.

## License

This package is NOT affiliated with CMS and/or the U.S. government in any way, shape or form.
There is no warranty whatsoever and using this package is entirely at your own risk.
Any nefarious or malicious use is strictly forbidden.

Copyright (c) 2023-present, Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php).
