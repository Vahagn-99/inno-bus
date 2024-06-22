<?php

namespace App\Http\Requests\Api\Location;

use App\DTO\SyncCarLocationDto;
use App\Interfaces\Dtoable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class SyncCarLocationRequest extends FormRequest implements Dtoable
{
    public function rules(): array
    {
        return [
            'car_id' => 'required|string|exists:cars,id',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ];
    }


    public function toDto(): SyncCarLocationDto
    {
        $data = $this->validated();
        return new SyncCarLocationDto(
            Arr::get($data, 'car_id'),
            Arr::get($data, 'longitude'),
            Arr::get($data, 'latitude'),
        );
    }
}
