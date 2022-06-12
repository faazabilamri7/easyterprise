<?php

namespace App\Observers;

use App\Models\PurchaseInvoice;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PurchaseInvoiceActionObserver
{
    public function created(PurchaseInvoice $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'PurchaseInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(PurchaseInvoice $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'PurchaseInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(PurchaseInvoice $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'PurchaseInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
