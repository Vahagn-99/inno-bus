<?php

namespace App\Http\Requests\Api\Car;

use App\DTO\CarFilterDto;
use App\Interfaces\Dtoable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class FilterCarListRequest extends FormRequest implements Dtoable
{
    public function rules(): array
    {
        return [
            'location_from' => ['required', 'string'],
            'location_to' => ['required', 'string'],
        ];
    }

    public function toDto(): CarFilterDto
    {
        $data = $this->validated();
        return new CarFilterDto(
            Arr::get($data, 'location_from'),
            Arr::get($data, 'location_to'),
        );
    }
}
