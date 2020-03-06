<?php

namespace Rozeo\OGP;

interface OgpImageInterface
{
    /**
     * get og:image:url
     * 
     * @property og:image:url
     * @return string image url
     */
    public function getUrl();

    /**
     * set og:image:url
     *
     * @param string $url image url
     * @return $this
     */
    public function setUrl(string $url);

    /**
     * get og:image:secure_url
     *
     * @property og:image:secure_url
     * @return string image secure url
     */
    public function getSecureUrl();

    /**
     * set og:image:secure_url
     *
     * @param string $secureUrl image secure url
     * @return $this
     */
    public function setSecureUrl(string $secureUrl);

    /**
     * get og:image:type(mime)
     *
     * @property og:image:type
     * @return string image type(mime)
     */
    public function getType();

    /**
     * set og:image:type(mime)
     *
     * @param string $mime type
     * @return $this
     */
    public function setType(string $type);

    /**
     * get og:image:width
     *
     * @property og:image:width
     * @return int image width size
     */
    public function getWidth();

    /**
     * set og:image:width
     *
     * @param int $width image width size
     * @return $this
     */
    public function setWidth(int $width);

    /**
     * get og:image:height
     *
     * @property og:image:height
     * @return int image height
     */
    public function getHeight();

    /**
     * set og:image:height
     *
     * @param int $height image height
     * @return $this
     */
    public function setHeight(int $height);

    /**
     * get og:image:alt
     *
     * @property og:image:alt
     * @return string image alt string
     */
    public function getAlt();

    /**
     * set og:image:alt
     *
     * @param string $alt image alt string
     * @return $this
     */
    public function setAlt(string $alt);
}
