<?php

namespace App\CMS;

use Contentful\Delivery\Query;
use Contentful\Laravel\Facades\ContentfulDelivery;
use Contentful\ResourceArray;

class ContentfulCMS
{
    public function getPosts()
    {
        $query = (new Query)->setContentType(ContentType::POST);
        $entries = ContentfulDelivery::getEntries($query);

        return $this->normalizeEntries($entries);
    }

    /**
     * @param \Contentful\ResourceArray $entries
     * @return \Illuminate\Support\Collection
     */
    public function normalizeEntries(ResourceArray $entries)
    {
        $collection = collect([]);

        foreach ($entries as $entry) {
            $object = json_decode(json_encode($entry));
            $collection->push($object);
        }

        return $collection;
    }
}
