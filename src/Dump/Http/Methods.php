<?php

namespace App\Enums\Http;

enum Methods
{
    case GET;
    case POST;
    case DELETE;
    case PATCH;
    case PUT;
    case HEAD;
}
