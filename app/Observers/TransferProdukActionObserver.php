<?php

namespace App\Observers;

use App\Models\TransferProduk;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class TransferProdukActionObserver
{
    public function created(TransferProduk $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'TransferProduk'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(TransferProduk $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'TransferProduk'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(TransferProduk $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'TransferProduk'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
