<?php

namespace App\Observers;

use App\Models\PurchaseOrder;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseOrderActionObserver
{
    public function created(PurchaseOrder $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseOrder $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseOrder $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseOrder'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
