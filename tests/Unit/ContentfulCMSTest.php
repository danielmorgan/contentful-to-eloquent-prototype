<?php

namespace Tests\Unit;

use App\CMS\ContentfulCMS;
use App\CMS\ContentType;
use Contentful\Delivery\Query;
use Contentful\Laravel\Facades\ContentfulDelivery;
use Tests\TestCase;

class ContentfulCMSTest extends TestCase
{
    /**
     * @var \App\CMS\ContentfulCMS
     */
    private $cms;

    /** @test */
    function can_get_posts()
    {
        $posts = $this->cms->getPosts();

        $this->assertNotEmpty($posts);
        $this->assertEquals(ContentType::POST, $posts->first()->sys->contentType->sys->id);
    }

    /** @test */
    function normalizing_entries_to_collection_of_objects()
    {
        $query = (new Query)->setLimit(3);
        $entries = ContentfulDelivery::getEntries($query);

        $normalizedEntries = $this->cms->normalizeEntries($entries);

        $this->assertEquals(3, $normalizedEntries->count());
        $this->assertInternalType('object', $normalizedEntries);
        $this->assertObjectHasAttribute('sys', $normalizedEntries->first());
        $this->assertObjectHasAttribute('fields', $normalizedEntries->first());
    }


    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->cms = new ContentfulCMS;
    }
}
