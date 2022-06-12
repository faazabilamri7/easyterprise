<?php

namespace App\Observers;

use App\Models\ProductTag;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductTagActionObserver
{
    public function created(ProductTag $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ProductTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ProductTag $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ProductTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ProductTag $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ProductTag'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
