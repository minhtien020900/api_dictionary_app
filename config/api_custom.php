<?php

use Symfony\Component\HttpFoundation\Response;

return [
    'no_have_error' => env('NO_HAVE_ERROR', 0),
    'have_error' => env('HAVE_ERROR', 1),
    'no_have_error_msg' => env('NO_HAVE_ERROR_MSG', 0),
    'status_code' => [
        422 => Response::HTTP_UNPROCESSABLE_ENTITY,
        401 => Response::HTTP_UNAUTHORIZED,
        200 => Response::HTTP_OK,
        201 => Response::HTTP_CREATED,
    ]
];
