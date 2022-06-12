<?php

namespace App\Observers;

use App\Models\AssetCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class AssetCategoryActionObserver
{
    public function created(AssetCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'AssetCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(AssetCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'AssetCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(AssetCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'AssetCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
