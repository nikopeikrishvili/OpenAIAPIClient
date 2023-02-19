<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

use IteratorAggregate;
use ArrayIterator;
use Traversable;

class ModelCollection implements IteratorAggregate, \Countable
{
    private array $models = [];

    public function add(Model $model): void
    {
        $this->models[] = $model;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->models);
    }

    public function count(): int
    {
        return count($this->models);
    }
}