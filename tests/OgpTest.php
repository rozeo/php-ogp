<?php

use PHPUnit\Framework\TestCase;

use Rozeo\Ogp\Ogp;
use Rozeo\Ogp\OgpDataInterface;

class OgpTest extends TestCase
{
    private $imageMock;

    public function setUp(): void
    {
        $this->imageMock = new class implements OgpDataInterface
        {
            /**
             * @return string[]
             */
            public function toHtml()
            {
                return [];
            }
        };
        $this->ogp = new Ogp();
    }

    /**
     * @test
     */
    public function checkConstruct()
    {
        $title = "Hey Title";
        $type = "hogeType";
        $url = "http://example.com/uniq";
        $instance = new Ogp($title, $type, $this->imageMock, $url);

        $this->assertEquals($instance->getTitle(), $title);
        $this->assertEquals($instance->getType(), $type);
        $this->assertEquals($instance->getOgpDataBody(), $this->imageMock);
        $this->assertEquals($instance->getUrl(), $url);
    }

    /**
     * @test
     */
    public function setInvalidUrl()
    {
        $this->expectException(UnexpectedValueException::class);

        $this->ogp->setUrl("abcde");
    }

    /**
     * @test 
     */
    public function checkConvertableString()
    {
        $ogp = new Ogp();
        $ogp->setTitle("Test title");
        $ogp->setOgpDataBody($this->imageMock);

        $htmlStr = (string)$ogp;
        $collectStr = "<meta property=\"og:title\" content=\"Test title\">\n";

        $this->assertEquals($htmlStr, $collectStr);
    }
}
