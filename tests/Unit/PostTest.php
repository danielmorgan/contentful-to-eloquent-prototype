<?php

namespace Tests\Unit;

use App\ContentType;
use App\Post;
use Contentful\Delivery\Client;
use Contentful\Delivery\Query;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * @group integration
 */
class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var \Contentful\Delivery\Client
     */
    private $client;


    /** @test */
    function creating_from_contentful_dynamic_entry()
    {
        $entry = $this->getAnEntryOfType(ContentType::POST);

        $post = Post::createFromContentful($entry);

        $this->assertInternalType('string', $post->title);
        $this->assertInternalType('string', $post->body);
    }

    /** @test */
    function cannot_create_from_incorrect_content_type()
    {
        $entry = $this->getAnEntryOfType(ContentType::AUTHOR);

        try {
            Post::createFromContentful($entry);
        } catch (\InvalidArgumentException $e) {
            $this->assertEquals(0, Post::all()->count());
            return;
        }

        $this->fail('Successfully created a Post despite the contentful content type being something other than a Post.');
    }


    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->client = new Client(env('CONTENTFUL_TOKEN'), env('CONTENTFUL_SPACE'));
    }

    /**
     * @param string $type
     * @return object
     */
    private function getAnEntryOfType($type)
    {
        $query = (new Query)->setContentType($type)->setLimit(1);

        $dynamicEntry = $this->client->getEntries($query)[0];

        return json_decode(json_encode($dynamicEntry));
    }
}
