<?php

namespace Rozeo\OGP;

use ReflectionClass;
use ReflectionMethod;

trait AnnotationPropertyHtmlConverter
{
    /**
     * convert to html code.
     *
     * @return string[] html string
     */
    public function toHtml()
    {
        $out = [];

        $className = (new ReflectionClass($this))->getName();
        $classMethods = get_class_methods($className);

        foreach ($classMethods as $name) {
            $metaName = $this->getPropertyMetaName($className, $name);
            
            if (empty($metaName)) continue;

            
            $value = $this->$name();

            if (!empty($value)) {
                $out[] = "<meta property=\"$metaName\" content=\"$value\">";        
            }
        }

        return $out;
    }

    /**
     * get annotation meta-name value.
     *
     * @return string|null property value
     */
    public function getPropertyMetaName(string $className, string $methodName)
    {
        $reflection = new ReflectionMethod($className, $methodName);

        if(!($docComment = $reflection->getDocComment())) return null;

        $annotationRow = explode("\n", $docComment);

        foreach ($annotationRow as $annotation) {
            if (preg_match("/\@meta-name (.+)$/", $annotation, $match)) {
                return trim($match[1]);
            }
        }

        return null;
    }
}
