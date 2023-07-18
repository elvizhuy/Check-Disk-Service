<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiskPartitionResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        return [
            'file_system' => $this->file_system,
            'size'=> $this->size,
            'used' => $this->used,
            'available' => $this->available,
            'use_percentage' => $this->use_percentage,
            'belongtoVirtualMachine' =>$this->belongtoVirtualMachine,
            'created_at' => (new \DateTime($this->created_at))->format('d-m-Y'),
            'updated_at' => (new \DateTime($this->updated_at))->format('d-m-Y H:m:s'),
        ];
    }
}
