<?php /** @noinspection PhpUnused */



namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $minutes = config('jwt.ttl');
        return [
            'token' => $this->resource,
            'expire' => now()->addMinutes($minutes)->toIso8601String(),
        ];
    }
}
