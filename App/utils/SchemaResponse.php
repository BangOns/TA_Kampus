<?php

function Response($status, $data, $message)
{
    return [
        'status' => $status,
        'message' => $message,
        'data' => $data
    ];
}
