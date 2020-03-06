<?php

namespace Rozeo\Ogp;

interface OgpDataInterface
{
    /**
     * convert properties to HTML meta tag set.
     *
     * @return string[] converted html string
     */
    public function toHtml();
}
