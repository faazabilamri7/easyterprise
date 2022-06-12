<?php

namespace App\Observers;

use App\Models\SalesInvoice;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class SalesInvoiceActionObserver
{
    public function created(SalesInvoice $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'SalesInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(SalesInvoice $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'SalesInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(SalesInvoice $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'SalesInvoice'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
