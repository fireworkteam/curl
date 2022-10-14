# Firework PHP : HTTP Client

## Basic usage

```php
    <?php

    use Firework\Curl\Curl; // Import Curl class
    require __DIR__ . '/../vendor/autoload.php'; // Import composer autoload

    $curl = new Curl(); // Create new Curl class
    $curl->setUrl("https://httpbin.org/post"); // Add Curl url

    $response = $curl->post([
        "name" => "jonn",
        "age" => 25
    ], true);

    print_r($response);
```

## Docs

### setUrl()
Set url of the request \
Params: 
- $url = url of the request

```php
    $url = "http://example.com/

    $curl->setUrl($url);
```

### setHeaders()
Set headers of the request \
Params: 
- $headers = string or array of headers:

```php
    $headers = ["HeaderName:HeaderValue", "HeaderName2:HeaderValue2"]
    $curl->setHeaders($headers);
```

### setCurlSettings()
Set curl settings of the request \
Params: 
- $arr = array of settings:

```php
    $arr = [CURLOPT_URL => "http://example.com", CURLOPT_HEADER => false]
    $curl->setCurlSettings($arr);
```

### get()
Send get request to url \
Params: 
- $arr = array of request values:

```php
    $arr = ["name" => "john", "age" => 25]
    $curl->get($arr);
```

### post()
Send post request to url \
Params: 
- $arr = array of request values:

```php
    $arr = ["name" => "john", "age" => 25]
    $curl->post($arr);
```

### put()
Send put request to url \
Params: 
- $arr = array of request values:

```php
    $arr = ["name" => "john", "age" => 25]
    $curl->put($arr);
```

### delete()
Send delete request to url \
Params:
- $arr = array of request values:

```php
    $arr = ["name" => "john", "age" => 25]
    $curl->delete($arr);
```

### patch()
Send patch request to url \
Params: 
- $arr = array of request values:

```php
    $arr = ["name" => "john", "age" => 25]
    $curl->patch($arr);
```