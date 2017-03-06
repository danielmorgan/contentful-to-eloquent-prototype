<?php

namespace App;

use App\CMS\ContentType;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * @param $entry
     * @return mixed
     */
    public static function createFromContentful($entry)
    {
        $contentTypeId = $entry->sys->contentType->sys->id;

        if ($contentTypeId !== ContentType::POST) {
            throw new \InvalidArgumentException;
        }

        return self::create([
            'title' => $entry->fields->title->{"en-GB"},
            'body' => $entry->fields->body->{"en-GB"},
        ]);
    }
}
