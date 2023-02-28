<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaDetailResource extends JsonResource
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
            'jurusan' => new JurusanResource($this->jurusan),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
