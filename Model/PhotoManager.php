<?php

namespace Piwiweb\PhotoalbumBundle\Model;

abstract class PhotoManager implements PhotoManagerInterface
{
    /**
     * Creates an empty photo instance
     *
     * @return Photo
     */
    public function createPhoto()
    {
        $class = $this->getClass();
        $photo = new $class;

        return $photo;
    }
}