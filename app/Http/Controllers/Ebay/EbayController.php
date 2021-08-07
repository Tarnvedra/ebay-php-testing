<?php


namespace App\Http\Controllers\Ebay;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Ebay\Requests\CreateEbayItemRequest;
use \DTS\eBaySDK\Shopping\Services;
use \DTS\eBaySDK\Shopping\Types;

use \DTS\eBaySDK\Inventory\Enums;

class EbayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ViewFactory $view, User $user): View
    {
        return $view->make('ebay.index', ['user' => $user]);
    }

    public function contact(ViewFactory $view, User $user): View
    {

        return $view->make('ebay.contact', ['user' => $user]);
    }

    public function create(ViewFactory $view, User $user): View
    {

        return $view->make('ebay.create', ['user' => $user]);
    }

    public function store(CreateEbayItemRequest $request, User $user)
    {


    }

    public function getTime()
    {
    // Create the service object.
        $service = new Services\ShoppingService();

     // Create the request object.
        $request = new Types\GeteBayTimeRequestType();

     // Send the request to the service operation.
        $response = $service->geteBayTime($request);

       // Output the result of calling the service operation.
        printf("The official eBay time is: %s\n", $response->Timestamp->format('H:i (\G\M\T) \o\n l jS Y'));

    }



}
