<?php

namespace Phpadam\DashboardSpatieRssTile;

use Livewire\Component;


class SpatieRssTileComponent extends Component
{

   public $position;


   public function mount(string $position)
   {
       $this->position = $position;
   }

    public function render()
    {
        return view('DashboardSpatieRssTile::tile', [
            'rssitems' => MyStore::make()->getData(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.rsstile.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
