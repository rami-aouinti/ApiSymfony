<?php

declare(strict_types=1);

namespace App\General\Transport\AutoMapper;

use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use AutoMapperPlus\MapperInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RestAutoMapperConfiguration
 *
 * @package App\General
 */
abstract class RestAutoMapperConfiguration implements AutoMapperConfiguratorInterface
{
    /**
     * Classes to use specified request mapper.
     *
     * @var array<int, class-string>
     */
    protected static array $requestMapperClasses = [];

    public function __construct(
        protected readonly MapperInterface $requestMapper,
    ) {
    }

    /**
     * Use this method to register your mappings.
     *
     * @psalm-suppress UndefinedThisPropertyFetch
     */
    public function configure(AutoMapperConfigInterface $config): void
    {
        foreach (static::$requestMapperClasses as $requestMapperClass) {
            $config
                ->registerMapping(Request::class, $requestMapperClass)
                ->useCustomMapper($this->requestMapper);
        }
    }
}
