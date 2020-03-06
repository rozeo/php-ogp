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
            public function toHtml()
            {
                return "";
            }
        };
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
}
