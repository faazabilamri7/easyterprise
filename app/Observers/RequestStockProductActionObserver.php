<?php

namespace App\Observers;

use App\Models\RequestStockProduct;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class RequestStockProductActionObserver
{
    public function created(RequestStockProduct $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'RequestStockProduct'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(RequestStockProduct $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'RequestStockProduct'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(RequestStockProduct $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'RequestStockProduct'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
