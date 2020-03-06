<?php

namespace Rozeo\Ogp;

use UnexpectedValueException;

class OgpImage implements OgpImageInterface, OgpDataInterface
{
    use AnnotationPropertyHtmlConverter;

    const VALID_IMAGE_MIME = [
        "image/png",
        "image/jpeg",
        "image/bmp",
        "image/gif",
        "image/webp",
    ];

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $secureUrl;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $alt;

    public function __construct()
    {
        $this->url = "";
        $this->secureUrl = "";
        $this->type = "";
        $this->width = 0;
        $this->height = 0;
        $this->alt = "";
    }

    /**
     * get og:image:url
     *
     * @meta-name og:image:url 
     * @return string image url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * set og:image:url
     * 
     * @param string $url image url
     * @return $this
     */
    public function setUrl(string $url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new UnexpectedValueException("$url is invalid url.");
        }

        $this->url = $url;
 
        $mime = $this->getMimeTypeFromUrl($url);
        if (!empty($mime)) {
            $this->setType($mime);
        }

        return $this;
    }

    /**
     * get og:image:secure_url
     *
     * @meta-name og:image:secure_url
     * @return string image secure url
     */
    public function getSecureUrl()
    {
        return $this->secureUrl;
    }

    /**
     * set og:image:secure_url
     *
     * @param string $secureUrl image secure url
     * @return $this
     */
    public function setSecureUrl(string $secureUrl)
    {
        if (!filter_var($secureUrl, FILTER_VALIDATE_URL)) {
            throw new UnexpectedValueException("$secureUrl is invalid url.");
        }

        if (!preg_match("/^https:/", $secureUrl)) {
            throw new UnexpectedValueException("$secureUrl is not secure.");
        }

        $this->secureUrl = $secureUrl;

        $mime = $this->getMimeTypeFromUrl($secureUrl);
        if (!empty($mime)) {
            $this->setType($mime);
        }

        return $this;
    }

    /**
     * get og:image:type(mime)
     *
     * @meta-name og:image:type
     * @return string image type(mime)
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * set og:image:type(mime)
     *
     * @param string $type mime type string
     * @return $this
     */
    public function setType(string $type)
    {
        if (!empty($type) && array_search($type, OgpImage::VALID_IMAGE_MIME) === FALSE) {
            throw new UnexpectedValueException("$type is invalid image mime type.");
        }

        $this->type = $type;

        return $this;
    }

    /**
     * get og:image:width
     *
     * @meta-name og:image:width
     * @return int image width size
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * set og:image:width
     *
     * @param int $width image width size
     * @return $this
     */
    public function setWidth(int $width)
    {
        if ($width < 0) {
            throw new UnexpectedValueException("$width less than 0.");
        }

        $this->width = $width;
        return $this;
    }

    /**
     * get og:image:height
     *
     * @meta-name og:image:height
     * @return int image height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * set og:image:height
     *
     * @param int $height image height
     * @return $this
     */
    public function setHeight(int $height)
    {
        if ($height < 0) {
            throw new UnexpectedValueException("$height less than 0.");
        }

        $this->height = $height;
        return $this;
    }

    /**
     * get og:image:alt
     *
     * @meta-name og:image:alt
     * @return string image alt string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * set og:image:alt
     *
     * @param string $alt image alt string
     * @return $this
     */
    public function setAlt(string $alt)
    {
        $this->alt = $alt;
        return $this;
    }

    /**
     * detect mime type from url string.
     *
     * @param string $url url string
     * @return string|null mime type
     */
    public function getMimeTypeFromUrl(string $url)
    {
        if (preg_match("/\.([^\.]+)$/", $url, $match)) {
            switch($match[1]) {
                case "jpg":
                case "jpeg":
                    return "image/jpeg";

                case "png":
                    return "image/png";

                case "gif":
                    return "image/gif";

                case "webp":
                    return "image/webp";

                case "bmp":
                    return "image/bmp";
            }
        }
        return null;
    }
}
