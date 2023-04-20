<?php

namespace Setebit\Package;

use Illuminate\Support\Collection;

class WildcardPermission
{
    public const WILDCARD_TOKEN = '*';
    public const PART_DELIMITER = '.';
    public const SUBPART_DELIMITER = ',';

    protected $permission;
    protected $parts;

    public function __construct(string $permission)
    {
        $this->permission = $permission;
        $this->parts = collect();

        $this->setParts();
    }

    public function implies(string $permission): bool
    {
        $permission = new static($permission);
        $otherParts = $permission->getParts();

        $i = 0;
        $partsCount = $this->getParts()->count();
        foreach ($otherParts as $otherPart) {
            if ($partsCount - 1 < $i) {
                return true;
            }

            if (!$this->parts->get($i)->contains(static::WILDCARD_TOKEN)
                && !$this->containsAll($this->parts->get($i), $otherPart)) {
                return false;
            }

            $i++;
        }

        for ($i; $i < $partsCount; $i++) {
            if (!$this->parts->get($i)->contains(static::WILDCARD_TOKEN)) {
                return false;
            }
        }

        return true;
    }

    public function getParts(): Collection
    {
        return $this->parts;
    }

    protected function setParts(): void
    {
        $parts = collect(explode(static::PART_DELIMITER, $this->permission));

        $parts->each(function ($item, $key) {
            $subParts = collect(explode(static::SUBPART_DELIMITER, $item));

            $this->parts->add($subParts);
        });
    }

    protected function containsAll(Collection $part, Collection $otherPart): bool
    {
        foreach ($otherPart->toArray() as $item) {
            if (!$part->contains($item)) {
                return false;
            }
        }

        return true;
    }
}