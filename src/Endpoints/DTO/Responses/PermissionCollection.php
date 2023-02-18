<?php

namespace NikoPeikrishvili\OpenAIAPIClient\Endpoints\DTO\Responses;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use ArrayIterator;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use JetBrains\PhpStorm\Internal\TentativeType;
use Traversable;

class PermissionCollection implements IteratorAggregate, Countable, ArrayAccess
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

    public function count(): int
    {
        return count($this->permissions);
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->permissions[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->permissions[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->permissions[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
       unset($this->permissions[$offset]);
    }

}