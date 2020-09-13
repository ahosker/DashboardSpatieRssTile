<?php

namespace Phpadam\DashboardSpatieRssTile;

use Spatie\Dashboard\Models\Tile;

class MyStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("rssTile");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('key', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('key') ?? [];
    }
}
