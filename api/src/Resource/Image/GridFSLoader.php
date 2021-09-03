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
use Liip\ImagineBundle\Binary\Loader\LoaderInterface;
use Liip\ImagineBundle\Exception\Binary\Loader\NotLoadableException;
use Liip\ImagineBundle\Model\Binary;
use MongoDB\BSON\ObjectId;
use Symfony\Component\Mime\MimeTypesInterface;
use Yawik\Resource\File\FileInterface;

class GridFSLoader implements LoaderInterface
{
    protected DocumentManager $dm;

    protected string $class;
    private MimeTypesInterface $guesser;

    public function __construct(
        DocumentManager $dm,
        MimeTypesInterface $guesser,
        string $class
    ) {
        $this->dm      = $dm;
        $this->guesser = $guesser;
        $this->class   = $class;
    }

    /**
     * {@inheritdoc}
     *
     * @param string $id
     */
    public function find($id)
    {
        /** @var GridFSRepository $repository */
        $repository = $this->dm->getRepository($this->class);
        /** @var FileInterface $file */
        $file = $repository->find(new ObjectId($id));

        if (null === $file) {
            throw new NotLoadableException(sprintf('Source file was not found with id "%s"', $id));
        }

        $stream = fopen($fileName = '/tmp/'.$id, 'w+');
        $repository->downloadToStream($id, $stream);
        fclose($stream);
        $contents = file_get_contents($fileName);
        $mimeType = $file->getMetadata()->getContentType();

        return new Binary(
            $contents,
            $mimeType,
            $this->getExtension($mimeType)
        );
    }

    private function getExtension(?string $mimeType): ?string
    {
        if (null === $mimeType) {
            return null;
        }

        return $this->guesser->getExtensions($mimeType)[0] ?? null;
    }
}
