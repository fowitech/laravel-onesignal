<?php

namespace Fowitech\OneSignal;

class OneSignal extends OneSignalClient
{
    public string $icon;
    public string $target_channel = 'push';
    public array $segment = [];
    public array $data = [];
    public array $to = [];

    public function to(array $to = []): static
    {
        $this->to = $to;

        return $this;
    }

    public function segment(array $data): static
    {
        $this->segment = $data;

        return $this;
    }

    public function icon(string $data): static
    {
        $this->icon = $data;

        return $this;
    }

    public function data(array $data = []): static
    {
        $this->data = $data;

        return $this;
    }

    public function send(string $title, string $message, array $params = []): array
    {
        $payload = [];

        if (!empty($this->data)) {
            $payload['data'] = $this->data;
        }

        return $this->post('notifications', [
            'app_id' => config('onesignal.app_id'),
            'include_aliases' => [
                'external_id' => $this->to
            ],
            'target_channel' => $this->target_channel,
            'included_segments' => $this->segment,
            'headings' => [
                'en' => $title
            ],
            'contents' => [
                'en' => $message
            ],
            'ios_badgeType' => "Increase",
            'ios_badgeCount' => 1,
            ...$payload,
            ...$params
        ]);
    }
}
