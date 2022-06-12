<?php

namespace App\Observers;

use App\Models\NotesVendor;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class NotesVendorActionObserver
{
    public function created(NotesVendor $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'NotesVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(NotesVendor $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'NotesVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(NotesVendor $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'NotesVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
