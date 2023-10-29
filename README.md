# pipetower-php-sdk
The PHP SDK for the Pipetower API  
[Pipetower API Docs](https://pipetower.com/docs/api)

# Installation
`composer require pipetower/pipetower-php-sdk`

# Usage
```
$pt = new \Pipetower\PhpSdk\Pipetower('api-token');
$account = $pt->account->info();
```