<?php
declare(strict_types=1);
namespace App\Http;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GenerahResponse implements \JsonSerializable
{
    public bool $success;
    public string $message;
    public array|JsonResource $data;

    public function __construct()
    {
        $this->message = '';
        $this->data = [];
    }

    public function jsonSerialize(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
