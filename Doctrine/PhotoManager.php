<?php

namespace Piwiweb\PhotoalbumBundle\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Piwiweb\PhotoalbumBundle\Model\PhotoManager as BasePhotoManager;
use Piwiweb\PhotoalbumBundle\Model\Photo;

class PhotoManager extends BasePhotoManager
{
    /**
     * @var \Doctrine\Common\Persistence\ObjectManager
     */
    protected $objectManager;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param ObjectManager $om
     * @param $class
     */
    public function __construct(ObjectManager $om, $class)
    {
        $this->objectManager = $om;
        $this->repository = $om->getRepository($class);

        $metadata = $om->getClassMetadata($class);
        $this->class = $metadata->getName();
    }

    /**
     * Deletes an photo
     *
     * @param Photo $photo
     */
    public function deletePhoto(Photo $photo)
    {
        $this->objectManager->remove($photo);
        $this->objectManager->flush();
    }

    /**
     * Find an photo by id
     *
     * @param int $id
     * @return Photo
     */
    public function findPhoto($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return Photo
     */
    public function findPhotoBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Find photos by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return Photo
     */
    public function findPhotosBy(array $criteria, $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Returns a collection with all photos
     *
     * @return Photo[]
     */
    public function findPhotos()
    {
        return $this->repository->findAll();
    }

    /**
     * Returns the photo's fully qualified class name
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Updates an photo
     *
     * @param Photo $photo
     * @param bool $andFlush
     * @return Photo
     */
    public function updatePhoto(Photo $photo, $andFlush = true)
    {
        $this->objectManager->persist($photo);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}