<?php


namespace App\Http\Controllers\Ebay;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Ebay\Requests\CreateEbayItemRequest;

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
}
