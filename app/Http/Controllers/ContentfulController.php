<?php

namespace App\Http\Controllers;

use Contentful\Delivery\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContentfulController extends Controller
{
    /**
     * @var \Contentful\Laravel\Facades\ContentfulDelivery
     */
    private $client;

    /**
     * ContentfulController constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function syncPosts()
    {
        // @todo implement
    }
}
