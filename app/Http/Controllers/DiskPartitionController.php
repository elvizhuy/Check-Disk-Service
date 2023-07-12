<?php

namespace App\Http\Controllers;

use App\Models\DiskPartition;
use Illuminate\Http\Request;

class DiskPartitionController extends Controller
{
    public function checkDisks () {
        $data = \request()->validate([
            'belongToVirtualMachine' => 'integer',
            'file_system' => 'string',
            'size' => 'string',
            'used' => 'string',
            'available' => 'string',
            'use%' => 'string',
        ]);

        $diskChecking = DiskPartition::create([
            'file_system' => $data['file_system'],
            'size' => $data['size'],
            'used' => $data['used'],
            'available' => $data['available'],
            'use%' => $data['use%'],
            'belongtoVirtualMachine' => $data['belongToVirtualMachine']
        ]);
        return response([$diskChecking],201);
    }

    public function getDisks ($id){
        $diskData = DiskPartition::find($id);
        return response([$diskData],200);
    }
}
