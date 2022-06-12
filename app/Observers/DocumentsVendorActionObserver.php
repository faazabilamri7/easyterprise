<?php

namespace App\Observers;

use App\Models\DocumentsVendor;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class DocumentsVendorActionObserver
{
    public function created(DocumentsVendor $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'DocumentsVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(DocumentsVendor $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'DocumentsVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(DocumentsVendor $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'DocumentsVendor'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
