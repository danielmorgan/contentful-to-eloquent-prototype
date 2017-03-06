<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public static function createFromContentful($entry)
    {
        $contentTypeId = $entry->sys->contentType->sys->id;

        if ($contentTypeId !== ContentType::POST) {
            throw new \InvalidArgumentException;
        }

        return new self([
            'title' => $entry->fields->title->{"en-GB"},
            'body' => $entry->fields->body->{"en-GB"},
        ]);
    }
}
