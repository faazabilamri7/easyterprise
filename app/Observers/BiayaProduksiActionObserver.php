<?php

namespace App\Observers;

use App\Models\BiayaProduksi;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class BiayaProduksiActionObserver
{
    public function created(BiayaProduksi $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'BiayaProduksi'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(BiayaProduksi $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'BiayaProduksi'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(BiayaProduksi $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'BiayaProduksi'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
