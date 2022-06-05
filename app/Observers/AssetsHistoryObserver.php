<?php

namespace App\Observers;

use App\Models\Asset;
use App\Models\AssetsHistory;

class AssetsHistoryObserver
{
    public function updated(Asset $asset)
    {
        if (auth()->check()) {
            AssetsHistory::create([
                'asset_id'         => $asset->id,
                'status_id'        => $asset->status_id,
                'location_id'      => $asset->location_id,
                'assigned_user_id' => $asset->assigned_to_id,
            ]);
        }
    }
}
