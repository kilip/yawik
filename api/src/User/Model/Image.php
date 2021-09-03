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

namespace Yawik\User\Model;

use ApiPlatform\Core\Annotation\ApiResource;
use Yawik\Resource\Controller\ImageCacheController as ImageController;
use Yawik\Resource\File\File;

#[ApiResource(
    collectionOperations: [
        'get',
        'post' => [
            'controller' => ImageController::class,
            'deserialize' => false,
            'openapi_context' => [
                'description' => 'Upload user image',
                'requestBody' => [
                    'content' => [
                        'multipart/form-data' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'file' => [
                                        'type' => 'string',
                                        'format' => 'binary',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    iri: 'https://schema.org/image'
)]
class Image extends File
{
}
