<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductActionObserver
{
    public function created(Product $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Product'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Product $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Product'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Product $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Product'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
