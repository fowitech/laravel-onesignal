<?php

namespace Fowitech\OneSignal;

class OneSignalMessage
{
    /** @var string */
    public $content;

    /** @var string */
    public $title;

    /** @var array */
    public array $data = [];

    public function __construct(string $title = '', string $content = '')
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function data(array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
