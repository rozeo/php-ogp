<?php

namespace Rozeo\OGP;

/**
 * See open graph protocol details: https://ogp.me/
 */
interface OgpInterface
{
    /**
     * get og:title
     *
     * @property og:title
     * @return string title
     */
    public function getTitle();

    /**
     * set og:title
     *
     * @param string $title ogp title
     */
    public function setTitle(string $title);

    /**
     * get og:type
     *
     * @property og:type
     * @return string typename string
     */
    public function getType();

    /**
     * set og:type
     *
     * @param string $type typename string
     * @return $this
     */
    public function setType();

    /**
     * get ogp data body.
     *
     * @return OgpImageInterface data interface
     */
    public function getOgpDataBody();

    /**
     * set ogp data body.
     *
     * @param OgpImageInterface data interface
     * @return $this
     */
    public function setOgpDataBody();

    /**
     * get og:url
     * 
     * @property og:url
     * @return string ogp ID url
     */
    public function getUrl();

    /**
     * set og:url 
     *
     * @param string $url ogp ID url
     * @return $this
     */
    public function setUrl(string $url);
}
