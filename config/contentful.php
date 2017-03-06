<?php
/**
 * @copyright 2016 Contentful GmbH
 * @license   MIT
 */

return [
    /**
     * The ID of the space you want to access
     */
    'delivery.space'   => env('CONTENTFUL_SPACE'),

    /**
     * An API key for the above specified space
     */
    'delivery.token'   => env('CONTENTFUL_TOKEN'),

    /**
     * Controls whether Contentful's Delivery or Preview API is accessed
     */
    'delivery.preview' => false,
];
