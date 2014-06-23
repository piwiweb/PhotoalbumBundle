<?php

namespace Piwiweb\PhotoalbumBundle\Model;

interface PhotoManagerInterface
{
    /**
     * Creates an empty photo instance
     *
     * @return Photo
     */
    public function createPhoto();

    /**
     * Deletes an photo
     *
     * @param Photo $photo
     */
    public function deletePhoto(Photo $photo);

    /**
     * Find an photo by id
     *
     * @param int $id
     * @return Photo
     */
    public function findPhoto($id);

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return Photo
     */
    public function findPhotoBy(array $criteria);

    /**
     * Find photos by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return Photo
     */
    public function findPhotosBy(array $criteria, $orderBy = null, $limit = null, $offset = null);

    /**
     * Returns a collection with all photos
     *
     * @return Photo[]
     */
    public function findPhotos();

    /**
     * Returns the photo's fully qualified class name
     *
     * @return string
     */
    public function getClass();

    /**
     * Updates an photo
     *
     * @param Photo $photo
     * @return Photo
     */
    public function updatePhoto(Photo $photo);
}