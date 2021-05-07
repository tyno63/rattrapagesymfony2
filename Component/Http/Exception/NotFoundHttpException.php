<?php

namespace Component\Http\Exception;


class NotFoundHttpException extends HttpException
{
    public function __construct()
    {
        parent::__construct('Not Found', 404);
    }
}