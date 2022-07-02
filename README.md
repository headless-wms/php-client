# Headless WMS PHP Client
With this PHP client you can connect to our API and integrate it in your application. 

## Getting started
Make sure you created an account on our website: a free trial account can be created at https://headless-wms.com/register/trial.
To use this client use should use:
```
composer require headless-wms/php-client
```
After you acquired an account, an API key can be generated. You can use examples/generate_api_key.php for an example on how to generate an API key.
When you have an API key you can set it on the client using setApiKey('Your API key').

```injectablephp
$client = new Client('', 'Your Email', 'Your Password');
$client->setApiKey('Your Api Key')
```

After that you are ready to use the client.