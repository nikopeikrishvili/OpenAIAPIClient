<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

use IteratorAggregate;
use ArrayIterator;
use Traversable;

class ModelCollection implements IteratorAggregate
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
}