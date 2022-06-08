<?php

namespace Modules\Share\Responses;

use Symfony\Component\HttpFoundation\Response;

class AjaxResponses
{
    public static function SuccessResponse()
    {
        return response()->json(['message' => 'mission accomplished.'], Response::HTTP_OK);
    }

    public static function FailedResponse()
    {
        return response()->json(['message' => 'The operation was not successful!'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
