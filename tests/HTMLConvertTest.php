<?php

use PHPUnit\Framework\TestCase;

class HTMLConvertTest extends TestCase
{

    private $mock;
    public function setUp(): void
    {
        $this->mock = new class {
            use Rozeo\Ogp\AnnotationPropertyHtmlConverter;
            /**
             * @meta-name test1
             */
            public function get()
            {
                return "abc";
            }

            public function set()
            {
                return $this;
            }
        };
    }

    /**
     * @test
     */
    public function checkBuildHtml()
    {
        $buildUpHtml = [
            '<meta property="test1" content="abc">'
        ];

        $this->assertEquals($this->mock->toHtml(), $buildUpHtml);
    }
}
