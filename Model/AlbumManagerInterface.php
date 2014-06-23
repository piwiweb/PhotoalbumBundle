<?php

namespace Piwiweb\PhotoalbumBundle\Model;

interface AlbumManagerInterface
{
    /**
     * Creates an empty album instance
     *
     * @return Album
     */
    public function createAlbum();

    /**
     * Deletes an album
     *
     * @param Album $album
     */
    public function deleteAlbum(Album $album);

    /**
     * Find an album by id
     *
     * @param int $id
     * @return Album
     */
    public function findAlbum($id);

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return Album
     */
    public function findAlbumBy(array $criteria);

    /**
     * Find albums by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return Album
     */
    public function findAlbumsBy(array $criteria, $orderBy = null, $limit = null, $offset = null);

    /**
     * Returns a collection with all albums
     *
     * @return Album[]
     */
    public function findAlbums();

    /**
     * Returns the album's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Updates an album
     *
     * @param Album $album
     * @return Album
     */
    public function updateAlbum(Album $album);
}