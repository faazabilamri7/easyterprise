<?php

namespace App\Observers;

use App\Models\PurchaseQuotation;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseQuotationActionObserver
{
    public function created(PurchaseQuotation $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseQuotation $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseQuotation $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseQuotation'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
