<?php

namespace Theme\NewsTv\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Theme\Http\Controllers\PublicController;
use Theme;

class NewsTvController extends PublicController
{
    /**
     * {@inheritDoc}
     */
    public function getIndex(BaseHttpResponse $response)
    {
        return parent::getIndex($response);
    }
    public function testIndex(BaseHttpResponse $response)
    {

        return  Theme::scope('test')->render();
    }

    /**
     * {@inheritDoc}
     */
    public function getView(BaseHttpResponse $response, $key = null)
    {
        return parent::getView($response, $key);
    }

    /**
     * {@inheritDoc}
     */
    public function getSiteMap()
    {
        return parent::getSiteMap();
    }
}
