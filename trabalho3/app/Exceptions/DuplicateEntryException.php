<?php

namespace App\Exceptions;

class DuplicateEntryException extends RenderableException
{
    public function __construct(string $modelName)
    {
        $this->message = 'Já existe um registro equivalente para ' . $modelName . '.';
    }
}
