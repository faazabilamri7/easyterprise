<?php

namespace App\Observers;

use App\Models\InvoicePembelian;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class InvoicePembelianActionObserver
{
    public function created(InvoicePembelian $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'InvoicePembelian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(InvoicePembelian $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'InvoicePembelian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(InvoicePembelian $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'InvoicePembelian'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
