<?php

namespace Piwiweb\PhotoalbumBundle\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Piwiweb\PhotoalbumBundle\Model\AlbumManager as BaseAlbumManager;
use Piwiweb\PhotoalbumBundle\Model\Album;

class AlbumManager extends BaseAlbumManager
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
     * Deletes an album
     *
     * @param Album $album
     */
    public function deleteAlbum(Album $album)
    {
        $this->objectManager->remove($album);
        $this->objectManager->flush();
    }

    /**
     * Find an album by id
     *
     * @param int $id
     * @return Album
     */
    public function findAlbum($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Find a user by the given criteria
     *
     * @param array $criteria
     * @return Album
     */
    public function findAlbumBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * Find albums by the given criteria
     *
     * @param array $criteria
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return Album
     */
    public function findAlbumsBy(array $criteria, $orderBy = null, $limit = null, $offset = null)
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Returns a collection with all albums
     *
     * @return Album[]
     */
    public function findAlbums()
    {
        return $this->repository->findAll();
    }

    /**
     * Returns the album's fully qualified class name
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Updates an album
     *
     * @param Album $album
     * @param bool $andFlush
     * @return Album
     */
    public function updateAlbum(Album $album, $andFlush = true)
    {
        $this->objectManager->persist($album);
        if ($andFlush) {
            $this->objectManager->flush();
        }
    }
}