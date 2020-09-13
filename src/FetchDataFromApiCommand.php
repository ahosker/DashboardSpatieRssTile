<?php

namespace Phpadam\DashboardSpatieRssTile;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Feeds; //https://github.com/willvincent/feeds
use Illuminate\Support\Facades\Log;

class FetchDataFromApiCommand extends Command
{
    protected $signature = 'dashboard:fetch-rss';

    protected $description = 'Fetch rss for tile';

    public function handle()
    {
        $this->info('Fetching RSS...');

        if(!config('dashboard.tiles.rsstile.feeds')){
          $this->error('You have no RSS Feeds in Config.');
          $this->info('Pulling BBC and CNN Feeds for example.');
        }

        $feedarray = explode(',', config('dashboard.tiles.rsstile.feeds') ?? 'http://feeds.bbci.co.uk/news/rss.xml,http://rss.cnn.com/rss/edition.rss');

        if(count($feedarray) < 0){
          $this->error('No RSS Feeds');
          Log::critical("Phpadam\DashboardSpatieRssTile: No RSS Feeds to Pull. Set them in config/dashboard.php");
          return;
        }

        $feed = Feeds::make($feedarray);

        if($feed->get_item_quantity() < 1){
          $this->error('No RSS Items');
          Log::info("Phpadam\DashboardSpatieRssTile: No RSS Items to Pull. Check your RSS Feed URLS are active.");
          return;
        }

        //$myData = Http::get($endpoint)->json();
        $data = array();
        foreach($feed->get_items() as $item){
          $data[] = array(
            "title" => $item->get_title(),
            "link" => $item->get_permalink(),
            "source" => $feed->get_title() ?? $item->get_feed()->get_title()
          );
        }

        MyStore::make()->setData($data);

        $this->info('All done!');
    }
}
