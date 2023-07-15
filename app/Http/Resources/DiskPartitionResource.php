<?php

namespace App\Http\Resources;

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
        return [
            'file_system' => $this->file_system,
            'size'=> $this->size,
            'used' => $this->used,
            'available' => $this->available,
            'use%' => $this->use,
            'belongtoVirtualMachine' =>$this->belongtoVirtualMachine,
            'created_at' => (new \DateTime($this->created_at))->format('d-m-Y H:m:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('d-m-Y H:m:s'),
        ];
    }
}
