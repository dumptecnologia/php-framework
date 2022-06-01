<?php

namespace Dump\Http;

use Dump\Http\Interfaces\MethodHttp;

/**
 * PHP HTTP request methods Enum
 * @ref https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods#especifica%C3%A7%C3%B5es
 */
enum Method implements MethodHttp
{
    case GET;               // RFC 7231
    case HEAD;              // RFC 7231
    case POST;              // RFC 7231
    case PUT;               // RFC 7231
    case DELETE;            // RFC 7231
    case CONNECT;           // RFC 7231
    case OPTIONS;           // RFC 7231
    case TRACE;             // RFC 7231
    case PATCH;             // RFC 5789


    public function name(): string
    {
        return $this->name;
    }

}
