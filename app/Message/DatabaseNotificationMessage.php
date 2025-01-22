<?php

namespace App\Message;

use JsonSerializable;

class DatabaseNotificationMessage implements JsonSerializable {
    protected array $payload = [
        'actor' => '',
        'message' => '',
        'cta_link' => '',
    ];

    public function __construct(string $message = '')
    {
        $this->message($message);
    }

    public static function create(string $message = ''): self
    {
        return new self($message);
    }

    public function actor(string $name): self
    {
        $this->payload['actor'] = $name;

        return $this;
    }

    public function message(string $message): self
    {
        $this->payload['message'] = $message;

        return $this;
    }

    public function ctaLink(string $link): self
    {
        $this->payload['cta_link'] = $link;

        return $this;
    }

    public function toArray(): array
    {
        return $this->payload;
    }

    public function jsonSerialize() {
        return $this->toArray();
    }
}