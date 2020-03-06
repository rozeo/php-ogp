<?php

namespace Rozeo\Ogp;

/**
 * See open graph protocol details: https://ogp.me/
 */
interface OgpInterface
{
    /**
     * get og:title
     *
     * @meta-name og:title
     * @return string title
     */
    public function getTitle();

    /**
     * set og:title
     *
     * @param string $title ogp title
     * @return $this
     */
    public function setTitle(string $title);

    /**
     * get og:type
     *
     * @meta-name og:type
     * @return string typename string
     */
    public function getType();

    /**
     * set og:type
     *
     * @param string $type typename string
     * @return $this
     */
    public function setType(string $type);

    /**
     * get ogp data body.
     *
     * @return OgpDataInterface data interface
     */
    public function getOgpDataBody();

    /**
     * set ogp data body.
     *
     * @param OgpDataInterface $body data interface
     * @return $this
     */
    public function setOgpDataBody(OgpDataInterface $body);

    /**
     * get og:url
     * 
     * @meta-name og:url
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
