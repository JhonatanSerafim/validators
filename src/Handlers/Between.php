<?php

namespace Validators\Handlers;

class Between implements \Validators\Contracts\ValidatorHandler
{

    public function __construct(private $first, private $last)
    {
    }

    public function handle($value): bool
    {
        return $value >= $this->first && $value <= $this->last;
    }
}
