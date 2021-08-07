<?php

namespace App\Http\Controllers\Ebay\Services;

use \DTS\eBaySDK\Inventory\Services;
use \DTS\eBaySDK\Inventory\Types;
use \DTS\eBaySDK\Inventory\Enums;
use Illuminate\Contracts\Cache\Repository;

class Inventory
{
    private $cache;

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    public function createItem()
    {
        $config = require(base_path('configuration.php'));

        $authorised = new EbayOAuthToken($this->cache);
        $service = new Services\InventoryService([
            'authorization'    => $authorised->authToken(),
            'requestLanguage'  => 'en-US',
            'responseLanguage' => 'en-US',
            'sandbox'          => true
        ]);

        /**
         * Create the request object.
         */
        $request = new Types\CreateOrReplaceInventoryItemRestRequest();

        /**
         * Note how URI parameters are just properties on the request object.
         */
        $request->sku = '123';

        $request->availability = new Types\Availability();
        $request->availability->shipToLocationAvailability = new Types\ShipToLocationAvailability();
        $request->availability->shipToLocationAvailability->quantity = 50;

        $request->condition = Enums\ConditionEnum::C_NEW_OTHER;

        $request->product = new Types\Product();
        $request->product->title = 'TEST ITEM GoPro Hero4 Helmet Cam';
        $request->product->description = 'TEST ITEM New GoPro Hero4 Helmet Cam. Unopened box.';
        /**
         * Aspects are specified as an associative array.
         */
        $request->product->aspects = [
            'Brand'                => ['GoPro'],
            'Type'                 => ['Helmet/Action'],
            'Storage Type'         => ['Removable'],
            'Recording Definition' => ['High Definition'],
            'Media Format'         => ['Flash Drive (SSD)'],
            'Optical Zoom'         => ['10x', '8x', '4x']
        ];
        $request->product->imageUrls = [
            'http://i.ebayimg.com/images/i/182196556219-0-1/s-l1000.jpg',
            'http://i.ebayimg.com/images/i/182196556219-0-1/s-l1001.jpg',
            'http://i.ebayimg.com/images/i/182196556219-0-1/s-l1002.jpg'
        ];

        /**
         * Send the request.
         */

        $response = $service->createOrReplaceInventoryItem($request);



        /**
         * Output the result of calling the service operation.
         */
        printf("\nStatus Code: %s\n\n", $response->getStatusCode());
        if (isset($response->errors)) {
            foreach ($response->errors as $error) {
                printf(
                    "%s: %s\n%s\n\n",
                    $error->errorId,
                    $error->message,
                    $error->longMessage
                );
            }
        }

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 400) {
            echo "Success\n";
        }
    }
}
