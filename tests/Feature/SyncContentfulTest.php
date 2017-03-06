<?php

namespace Tests\Feature;

use App\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SyncContentfulTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function importing_posts_from_contentful()
    {
        $response = $this->json('POST', '/sync/posts');

        $response->assertStatus(201);
        $this->assertNotEmpty(Post::all());
        $this->assertInternalType('string', Post::first()->title);
    }
}
