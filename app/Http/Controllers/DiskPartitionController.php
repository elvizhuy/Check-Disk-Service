<?php

namespace App\Http\Controllers;

use App\Models\DiskPartition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
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

    public function getDisks (){
        $id = \request()->get('virtual_id');
        $limit = \request()->get('limit');
        $diskData = DiskPartition::query()->where('belongtoVirtualMachine',$id)->paginate($limit);
        return response([$diskData],200);
    }
}
