<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

use IteratorAggregate;
use ArrayIterator;
use Traversable;

class PermissionCollection implements IteratorAggregate
{
    private array $permissions = [];

    public function add(Permission $permission): void
    {
        $this->permissions[] = $permission;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->permissions);
    }
}