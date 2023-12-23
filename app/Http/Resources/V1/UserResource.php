<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\ExerciseResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);


        $data = [
            '_id' => $this->id,
            'username' => $this->username,
        ];
        $params = $request->query();

        if (count($params) != 0 && $this->relationLoaded('exercises')) {
            $exercises = $this->exercises;
            if (array_key_exists('from', $params)) {
                $exercises = $exercises->where('date', '>=', $params['from']);
                $data['count'] = count($exercises);
                $data['exercises'] = ExerciseResource::collection($exercises);
            }
            if (array_key_exists('to', $params)) {
                $exercises = $exercises->where('date', '<=', $params['to']);
                $data['count'] = count($exercises);
                $data['exercises'] = ExerciseResource::collection($exercises);
            }
            if (array_key_exists('limit', $params)) {
                $exercises = $exercises->take($params['limit']);
                $data['count'] = count($exercises);
                $data['exercises'] = ExerciseResource::collection($exercises);
            }
        } else if (count($params) == 0 && $this->relationLoaded('exercises')) {
            $data['count'] = count($this->exercises);
            $data['exercises'] = ExerciseResource::collection($this->exercises);
        }
        return $data;
    }
}
