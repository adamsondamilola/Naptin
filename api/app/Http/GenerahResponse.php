<?php
declare(strict_types=1);
namespace App\Http;

class GenerahResponse implements \JsonSerializable
{
    public bool $success;
    public string $message;
    public array $data;

    public function jsonSerialize(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
