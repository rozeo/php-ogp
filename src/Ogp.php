<?php

namespace Rozeo\OGP;

/**
 * See open graph protocol details: https://ogp.me/
 */
class Ogp implements OgpInterface
{
    use AnnotationPropertyHtmlConverter;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $type;

    /**
     * @var OgpDataInterface
     */
    private $body;

    /**
     * @var string
     */
    private $url;

    /**
     * get og:title
     *
     * @meta-name og:title
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * set og:title
     *
     * @param string $title ogp title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * get og:type
     *
     * @meta-name og:type
     * @return string typename string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * set og:type
     *
     * @param string $type typename string
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * get ogp data body.
     *
     * @return OgpDataInterface|null data interface
     */
    public function getOgpDataBody()
    {
        return $this->body;
    }

    /**
     * set ogp data body.
     *
     * @param OgpDataInterface data interface
     * @return $this
     */
    public function setOgpDataBody(OgpDataInterface $body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * get og:url
     * 
     * @meta-name og:url
     * @return string ogp ID url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * set og:url 
     *
     * @param string $url ogp ID url
     * @return $this
     */
    public function setUrl(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new UnexpectedValueException("$url is invalid url.");
        }

        $this->url = $url;
        return $this;
    }
}
