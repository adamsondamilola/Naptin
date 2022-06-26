<?php
declare(strict_types=1);
namespace App\Http;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GenerahPayload implements \JsonSerializable
{
    private bool $success;
    private string $message;
    private array|JsonResource $data;

    public function __construct()
    {
        $this->message = '';
        $this->data = [];
    }

    public function setPayload(bool $success, string $message = '', array|JsonResource $data = []): void
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
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
