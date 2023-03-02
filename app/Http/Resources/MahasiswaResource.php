<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\JurusanResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nim' => $this->nim,
            'kelas' => $this->kelas,
            'alamat' => $this->alamat,
            'jurusan' => new JurusanResource($this->whenLoaded('jurusan')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
