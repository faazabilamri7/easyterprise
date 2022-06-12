<?php

namespace App\Observers;

use App\Models\AssetLocation;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AssetLocationActionObserver
{
    public function created(AssetLocation $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'AssetLocation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(AssetLocation $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'AssetLocation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(AssetLocation $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'AssetLocation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
