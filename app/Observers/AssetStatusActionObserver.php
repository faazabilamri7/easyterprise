<?php

namespace App\Observers;

use App\Models\AssetStatus;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AssetStatusActionObserver
{
    public function created(AssetStatus $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'AssetStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(AssetStatus $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'AssetStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(AssetStatus $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'AssetStatus'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
