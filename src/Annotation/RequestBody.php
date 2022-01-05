<?php

namespace Nbhtm\ApiDocs\Annotation;

/**
 * @Annotation
 */
class RequestBody
{
    /**
     * @var string
     */
    public $key;


    public $type = 'string';

    public $value = null;

    /**
     * @var string
     */
    public $desc = null;
}