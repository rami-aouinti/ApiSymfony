<?php

declare(strict_types=1);

namespace App\Rest;

use App\Collection\Traits\CollectionTrait;
use App\Rest\Interfaces\ControllerInterface;
use Closure;
use Countable;
use IteratorAggregate;
use Psr\Log\LoggerInterface;

use function sprintf;

/**
 * Class ControllerCollection
 *
 * @package App\Rest
 *
 * @property IteratorAggregate|IteratorAggregate<int, ControllerInterface> $items
 *
 * @method ControllerInterface get(string $className)
 * @method IteratorAggregate<int, ControllerInterface> getAll()
 */
class ControllerCollection implements Countable
{
    use CollectionTrait;

    /**
     * Constructor
     *
     * @param IteratorAggregate<int, ControllerInterface> $items
     */
    public function __construct(
        private IteratorAggregate $items,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorMessage(string $className): string
    {
        return sprintf('REST controller \'%s\' does not exist', $className);
    }

    /**
     * {@inheritdoc}
     */
    public function filter(string $className): Closure
    {
        return static fn (ControllerInterface $restController): bool => $restController instanceof $className;
    }
}
