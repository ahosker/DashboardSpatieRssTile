<x-dashboard-tile :position="$position" :refresh-interval="$refreshIntervalInSeconds">
    <div class="grid grid-rows-auto-1 gap-2 h-full p-2">
        <div class="flex items-center justify-center w-10 h-10 rounded-full">
            <div class="text-3xl leading-none">News</div>
        </div>
        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | divide-y-2">
          <ul class="list-disc">
            @foreach ($rssitems as $item)
                <li>
                  <a href="{{$item["link"]}}">{{$item["title"]}}</a> @if($item["source"])<span class="text-xs">({{$item["source"]}})</span>@endif
                </li>
            @endforeach
          </ul>
        </div>
    </div>
</x-dashboard-tile>
