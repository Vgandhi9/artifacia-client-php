# Artifacia php Client

This php client is a simple wrapper around our powerful Visual Discovery [API](http://docs.artifacia.com/).

The wrapper allows you to create your own indexes of images on which you would like to enhance the product discovery experiences. It also allows you to get various types of recommendations which are listed below.

* Visual Recommendation
* Cross Product Recommendation
* Smart Recommendation

## Installation

To install the package you can follow the steps:-

```php
composer require artifacia/artifacia-client-php
```

## Getting Started

The API is really easy and simple to use. First you need to visit [this](http://www.artifacia.com/contact/) page and request for username and password. Using that credentials you can create your constructor and get stated. 

```php
require __DIR__ . '/vendor/autoload.php';
$user_name = <your_username>;
$password = <your_password>;
use Artifacia\Client;
$client = new Client($user_name, $password);
```

### Creating your index
The first step is to create a index of the items that you would like to store in our databases to perform search against. If you don't have data ready right now you can quickly get started with our [sample data](https://github.com/artifacia/artifacia-client-php/blob/master/sample_data.json). Once the data is stored and indexed we will inform you shortly.

```php
$data = file_get_contents("./sample_data.json");
$data_indexing_response = client->upload_item_data($data);
echo $data_indexing_response;
```

### Performing Visual Recommendation
Once you receive a notification form us about the status of the indexed data, you are ready to search.
You can search for a product ID indexed in the sample data you inserted/uploaded.

```php
$sample_prod_id = 2761;
$query_response = client->get_visual_recommendations($sample_prod_id);
echo $query_response;
```
