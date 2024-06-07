<?php

namespace App\Exceptions;

use Exception;

class RenderableException extends Exception
{
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'exception' => [
                    'type' => class_basename(get_called_class()),
                    'message' => $this->message,
                ]
            ]);
        }
    }
}
