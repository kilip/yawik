<?php

/*
 * This file is part of the Yawik project.
 *
 * (c) 2013-2021 Cross Solution
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Yawik\Resource\Controller;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\GridFSRepository;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Yawik\Resource\Model\ImageCache;

class ImageCacheController
{
    private DocumentManager $dm;
    private \Doctrine\Persistence\ObjectRepository $repository;

    public function __construct(
        DocumentManager $dm
    ) {
        $this->dm         = $dm;
        $this->repository = $dm->getRepository(ImageCache::class);
    }

    public function __invoke(string $filter, string $path)
    {
        /** @var GridFSRepository $repository */
        $repository = $this->repository;
        /** @var ImageCache|null $file */
        $file = $repository->findOneBy([
            'metadata.filter' => $filter,
            'metadata.path' => $path,
        ]);

        if (null === $file) {
            throw new NotFoundHttpException('Cache image not found');
        }

        $response = new StreamedResponse();
        $response->headers->set('Content-Type', $file->getMetadata()->getContentType());
        $response->headers->set('ETag', $file->getId());

        $timestamp    = $file->getUploadDate()->getTimestamp();
        $lastModified = gmdate('D, d M Y H:i:s', $timestamp).' GMT';
        $response->headers->set('Last-Modified', $lastModified);

        $response->setCallback(function () use ($repository, $file) {
            $stream = $repository->openDownloadStream($file->getId());
            echo stream_get_contents($stream);
        });

        return $response;
    }
}
