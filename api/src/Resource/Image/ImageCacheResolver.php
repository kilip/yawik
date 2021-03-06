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

namespace Yawik\Resource\Image;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Repository\GridFSRepository;
use Doctrine\ODM\MongoDB\Repository\UploadOptions;
use Doctrine\Persistence\ObjectRepository;
use Liip\ImagineBundle\Binary\BinaryInterface;
use Liip\ImagineBundle\Imagine\Cache\Helper\PathHelper;
use Liip\ImagineBundle\Imagine\Cache\Resolver\ResolverInterface;
use Symfony\Component\Routing\RequestContext;
use Yawik\Resource\Model\ImageCache;
use Yawik\Resource\Model\ImageCacheMetadata;

class ImageCacheResolver implements ResolverInterface
{
    private DocumentManager $dm;
    private ObjectRepository|GridFSRepository $repository;
    private RequestContext $requestContext;
    private string $cachePrefix = 'media';

    public function __construct(
        DocumentManager $dm,
        RequestContext $requestContext
    ) {
        $this->dm             = $dm;
        $this->repository     = $dm->getRepository(ImageCache::class);
        $this->requestContext = $requestContext;
    }

    public function isStored($path, $filter): bool
    {
        return null !== $this->findCache($path, $filter);
    }

    public function resolve($path, $filter)
    {
        return sprintf('%s/%s',
            rtrim($this->getBaseUrl(), '/'),
            ltrim($this->getFileUrl($path, $filter), '/')
        );
    }

    public function store(BinaryInterface $binary, $path, $filter): void
    {
        /** @var GridFSRepository $repository */
        $repository = $this->repository;
        $dm         = $this->dm;
        $id         = md5($path.$filter);

        /** @var ImageCache|null $file */
        $file = $this->findCache($path, $filter);
        if (null !== $file) {
            $dm->remove($file);
            $dm->flush();
        }
        $stream = fopen($fileName= '/tmp/'.$id, 'w');
        fwrite($stream, $binary->getContent());
        fclose($stream);
        $metadata = new ImageCacheMetadata($path, $filter);
        $metadata->setContentType($binary->getMimeType());
        $uploadOptions           = new UploadOptions();
        $uploadOptions->metadata = $metadata;

        /* @var ImageCache $file */
        $repository->uploadFromStream(md5($path.$filter), fopen($fileName, 'r'), $uploadOptions);
    }

    public function remove(array $paths, array $filters): void
    {
        $dm = $this->dm;
        $db = $dm->getDocumentDatabase(ImageCache::class);
        $db->selectCollection('image.caches.files')->deleteMany([]);
        $db->selectCollection('image.caches.chunks')->deleteMany([]);
    }

    protected function getBaseUrl(): string
    {
        $port = '';
        if ('https' === $this->requestContext->getScheme() && 443 !== $this->requestContext->getHttpsPort()) {
            $port = ":{$this->requestContext->getHttpsPort()}";
        }

        if ('http' === $this->requestContext->getScheme() && 80 !== $this->requestContext->getHttpPort()) {
            $port = ":{$this->requestContext->getHttpPort()}";
        }

        $baseUrl = $this->requestContext->getBaseUrl();
        if ('.php' === mb_substr($this->requestContext->getBaseUrl(), -4)) {
            $baseUrl = pathinfo($this->requestContext->getBaseurl(), \PATHINFO_DIRNAME);
        }
        $baseUrl = rtrim($baseUrl, '/\\');

        return sprintf('%s://%s%s%s',
            $this->requestContext->getScheme(),
            $this->requestContext->getHost(),
            $port,
            $baseUrl
        );
    }

    protected function getFileUrl(string $path, string $filter): string
    {
        return PathHelper::filePathToUrlPath($this->getFullPath($path, $filter));
    }

    private function getFullPath(string $path, string $filter): string
    {
        // crude way of sanitizing URL scheme ("protocol") part
        $path = str_replace('://', '---', $path);

        return $this->cachePrefix.'/'.$filter.'/'.ltrim($path, '/');
    }

    /**
     * @return mixed|object|ImageCache|null
     */
    private function findCache(string $path, string $filter)
    {
        return $this->repository->findOneBy([
            'filename' => md5($path.$filter),
        ]);
    }
}
