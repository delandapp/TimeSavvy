<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRecource extends JsonResource
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
            'id_pivot' => $this->whenNotNull($this->pivot->id),
            'email' => $this->email,
            'name' => $this->name,
            'token' => $this->whenNotNull($this->token),
            'nama_lengkap' => $this->whenNotNull($this->detail_users->nama_lengkap),
            'nisn' => $this->whenNotNull($this->detail_users->nisn),
            'no_hp' => $this->whenNotNull($this->detail_users->no_hp),
            'alamat' => $this->whenNotNull($this->detail_users->alamat),
            'kota' => $this->whenNotNull($this->detail_users->kota),
            'provinsi' => $this->whenNotNull($this->detail_users->provinsi),
            'kode_pos' => $this->whenNotNull($this->detail_users->kode_pos),
            'kelas' => $this->whenNotNull($this->detail_users->kelas),
            'jurusan' => $this->whenNotNull($this->detail_users->jurusan),
        ];
    }
}
