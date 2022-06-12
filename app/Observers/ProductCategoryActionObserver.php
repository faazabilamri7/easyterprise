<?php

namespace App\Observers;

use App\Models\ProductCategory;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ProductCategoryActionObserver
{
    public function created(ProductCategory $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'ProductCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(ProductCategory $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'ProductCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(ProductCategory $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'ProductCategory'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
