# Artifacia php Client

This php client is a simple wrapper around our powerful Visual Discovery [API](http://docs.artifacia.com/).

The wrapper allows you to create your own index of images on which you would like to enhance the product discovery experiences. It also allows you to get various types of recommendations which are listed below.

* Visual Recommendation
* Cross Product Recommendation
* Personalized Recommendation

## Installation

To install the package you can follow the steps:-

```php
composer require artifacia/artifacia-client-php
```

## Getting Started

The API is really easy and simple to use. First you need to visit [this](http://www.artifacia.com/requestaccess/) page and request for username and password. Using that credentials you can create your constructor and get stated.

```php
require __DIR__ . '/vendor/autoload.php';
$ai_key = <api_key>;
use Artifacia\Client;
$client = new Client($api_key);
```

### Creating your index
The first step is to create a index of the items that you would like to store in our databases to perform search against. If you don't have data ready right now you can quickly get started with our [sample data](https://github.com/artifacia/artifacia-client-php/blob/master/sample_data.json). Once the data is stored and indexed we will inform you shortly.

```php
$data = file_get_contents("./sample_data.json");
$data_indexing_response = $client->upload_item_data($data);
echo $data_indexing_response;
```

### Performing Visual Recommendation
Once you receive a notification from us about the status of the indexed data, you are ready to search.
You can search for a product ID indexed in the sample data you inserted/uploaded. And also you can specify the number of results to be returned as well as set the attribute (like color, pattern, material etc.) if you want to prioritize the result as given below.

```php
$sample_prod_id = 2761;
$num = 4;
$filters = array('color' => 1, 'pattern' => 1);
$query_response = $client->get_visual_recommendation($sample_prod_id, $num, $filters);
echo $query_response;
```
