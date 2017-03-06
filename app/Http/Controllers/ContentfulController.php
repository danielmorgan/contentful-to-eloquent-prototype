<?php

namespace App\Http\Controllers;

use App\CMS\ContentfulCMS;
use App\Post;
use Illuminate\Http\Request;

class ContentfulController extends Controller
{
    public function syncPosts()
    {
        $entries = (new ContentfulCMS)->getPosts();

        foreach ($entries as $entry) {
            Post::createFromContentful($entry);
        }

        return response()->json(Post::all(), 201);
    }
}
