<?php

use PHPUnit\Framework\TestCase;

class OgpImageTest extends TestCase
{
    private $image;
    public function setUp(): void
    {
        $this->image = new Rozeo\Ogp\OgpImage();
    }

    /**
     * @test
     */
    public function setValidUrl()
    {
        $url = "https://google.com";
        $this->image->setUrl($url);

        $this->assertEquals($this->image->getUrl(), $url);
    }

    /**
     * @test
     */
    public function setInvalidUrl()
    {
        $this->expectException(UnexpectedValueException::class);

        $url = "abcdef";
        $this->image->setUrl($url);
    }

    /**
     * @test
     */
    public function setValidSecureUrl()
    {
        $url = "https://google.com";
        $this->image->setSecureUrl($url);

        $this->assertEquals($this->image->getSecureUrl(), $url);
    }

    /**
     * @test
     */
    public function setInvalidSecureUrl()
    {
        $this->expectException(UnexpectedValueException::class);

        $url = "abcdef";
        $this->image->setSecureUrl($url);
    }

    /**
     * @test
     */ 
    public function setInsecureUrlInSecureUrl()
    {
        $this->expectException(UnexpectedValueException::class);

        $url = "http://google.com";
        $this->image->setSecureUrl($url);
    }
    
    /**
     * @test
     */
    public function setUrlWithNoExtensionUrl()
    {
        $this->image->setType("");
        $this->image->setUrl("https://google.com");

        $this->assertEquals($this->image->getType(), "");
    }

    /**
     * @test
     */
    public function setUrlWithExtentionUrl()
    {
        $this->image->setType("");

        $this->image->setUrl("http://ogp.me/logo.png");

        $this->assertEquals($this->image->getType(), "image/png");
    }

    /**
     * @test
     */
    public function setType()
    {
        $this->image->setType("image/jpeg");

        $this->assertEquals($this->image->getType(), "image/jpeg");
    }

    /**
     * @test
     */
    public function setInvalidType()
    {
        $this->expectException(UnexpectedValueException::class);

        $this->image->setType("application/json");
    }
 
    /**
     * @test
     */
    public function setSecureUrlWithNoExtensionUrl()
    {
        $this->image->setType("");
        $this->image->setUrl("https://google.com");

        $this->assertEquals($this->image->getType(), "");
    }

    /**
     * @test
     */
    public function setSecureUrlWithExtentionUrl()
    {
        $this->image->setType("");

        $this->image->setUrl("https://ogp.me/logo.png");

        $this->assertEquals($this->image->getType(), "image/png");
    }

    /**
     * @test
     */
    public function setWidth()
    {
        $width = 40;
        $this->assertEquals($this->image->setWidth($width)->getWidth(), $width);
    }

    /**
     * @test
     */
    public function setInvalidWidth()
    {
        $this->expectException(UnexpectedValueException::class);

        $this->image->setWidth(-200);
    }

    /**
     * @test
     */
    public function setHeight()
    {
        $height = 100;
        $this->assertEquals($this->image->setHeight($height)->getHeight(), $height);
    }

    /**
     * @test
     */
    public function setInvalidHeihgt()
    {
        $this->expectException(UnexpectedValueException::class);

        $this->image->setHeight(-1000);
    }

    /**
     * @test
     */
    public function setAlt()
    {
        $alt = "alt testing";
        $this->assertEquals($this->image->setAlt($alt)->getAlt(), $alt);
    }

    /**
     * @test
     */
    public function extensionDetect()
    {
        $this->image->setUrl("http://example.com/test.jpg");
        $this->assertEquals($this->image->getType(), "image/jpeg");


        $this->image->setUrl("http://example.com/test.png");
        $this->assertEquals($this->image->getType(), "image/png");
        
        $this->image->setUrl("http://example.com/test.gif");
        $this->assertEquals($this->image->getType(), "image/gif");
        
        $this->image->setUrl("http://example.com/test.webp");
        $this->assertEquals($this->image->getType(), "image/webp");
    }
}
