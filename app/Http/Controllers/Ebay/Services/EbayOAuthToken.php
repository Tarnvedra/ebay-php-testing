<?php

namespace App\Http\Controllers\Ebay\Services;

use \DTS\eBaySDK\OAuth\Services;
use \DTS\eBaySDK\OAuth\Types;
use Illuminate\Contracts\Cache\Repository;

class EbayOAuthToken
{
    private $cache;

    public function __construct(Repository $cache)
    {
       $this->cache = $cache;
    }

    public function authToken()
    {
        $config = require(base_path('configuration.php'));

        $service = new Services\OAuthService([
            'credentials' => $config['sandbox']['credentials'],
            'ruName' => $config['sandbox']['ruName'],
            'sandbox' => true
        ]);

       $authorised = $this->cache->get('ebay-token');

        if (!$authorised) {
            $response = $service->getAppToken();

            if ($response->getStatusCode() !== 200) {
                printf(
                    "%s: %s\n\n",
                    $response->error,
                    $response->error_description
                );
            } else {
                $token = $response->access_token;
                $this->cache->put('ebay-token', $token, $response->expires_in);
               }
        }

      return $authorised;
       }
}
