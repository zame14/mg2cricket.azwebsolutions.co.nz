<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/9/2017
 * Time: 4:11 PM
 */
class Service extends mg2Base
{
    public function getPrice()
    {
        return $this->getPostMeta('price');
    }
}