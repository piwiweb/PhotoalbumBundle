<?php

namespace Piwiweb\PhotoalbumBundle\Model;

abstract class AlbumManager implements AlbumManagerInterface
{
    /**
     * Creates an empty album instance
     *
     * @return Album
     */
    public function createAlbum()
    {
        $class = $this->getClass();
        $album = new $class;

        return $album;
    }
}