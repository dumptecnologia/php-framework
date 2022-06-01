<?php

namespace Dump\Http;

use Dump\Http\Interfaces\StatusCodeInterface;

enum Status: int implements StatusCodeInterface
{
	
	// [Informational 1xx]
	case CONTINUE = 100;
	case SWITCHING_PROTOCOLS = 101;
	case PROCESSING = 102;                         // WebDAV; RFC 2518
	case EARLY_HINTS = 103;                        // RFC 8297
	
	// [Successful 2xx]
	case OK = 200;
	case CREATED = 201;
	case ACCEPTED = 202;
	case NON_AUTHORITATIVE_INFORMATION = 203;      // since HTTP/1.1
	case NO_CONTENT = 204;
	case RESET_CONTENT = 205;
	case PARTIAL_CONTENT = 206;                    // RFC 7233
	case MULTI_STATUS = 207;                       // WebDAV; RFC 4918
	case ALREADY_REPORTED = 208;                   // WebDAV; RFC 5842
	case IM_USED = 226;                            // RFC 3229
	
	// [Redirection 3xx]
	case MULTIPLE_CHOICES = 300;
	case MOVED_PERMANENTLY = 301;
	case FOUND = 302;                              // Previously "Moved temporarily"
	case SEE_OTHER = 303;                          // since HTTP/1.1
	case NOT_MODIFIED = 304;                       // RFC 7232
	case USE_PROXY = 305;                          // unused
	case SWITCH_PROXY = 306;                       // unused
	case TEMPORARY_REDIRECT = 307;                 // since HTTP/1.1
	case PERMANENT_REDIRECT = 308;                 // RFC 7538
	
	// [Client Error 4xx]
	case BAD_REQUEST = 400;
	case UNAUTHORIZED = 401;
	case PAYMENT_REQUIRED = 402;
	case FORBIDDEN = 403;
	case NOT_FOUND = 404;
	case METHOD_NOT_ALLOWED = 405;
	case NOT_ACCEPTABLE = 406;
	case PROXY_AUTHENTICATION_REQUIRED = 407;      // RFC 7235
	case REQUEST_TIMEOUT = 408;
	case CONFLICT = 409;
	case GONE = 410;
	case LENGTH_REQUIRED = 411;
	case PRECONDITION_FAILED = 412;                // RFC 7232
	case REQUEST_ENTITY_TOO_LARGE = 413;           // RFC 7231
	case REQUEST_URI_TOO_LONG = 414;               // RFC 7231
	case UNSUPPORTED_MEDIA_TYPE = 415;             // RFC 7231
	case REQUESTED_RANGE_NOT_SATISFIABLE = 416;    // RFC 7233
	case EXPECTATION_FAILED = 417;
	case IM_A_TEAPOT = 418;                        // RFC 2324, RFC 7168
	case PAGE_EXPIRED = 419;                       // (unofficial) Laravel Framework
	case MISDIRECTED_REQUEST = 421;                // RFC 7540
	case UNPROCESSABLE_ENTITY = 422;               // WebDAV; RFC 4918
	case LOCKED = 423;                             // WebDAV; RFC 4918
	case FAILED_DEPENDENCY = 424;                  // WebDAV; RFC 4918
	case TOO_EARLY = 425;                          // RFC 8470
	case UPGRADE_REQUIRED = 426;                   // WebDAV; RFC 4918
	case PRECONDITION_REQUIRED = 428;              // RFC 6585
	case TOO_MANY_REQUESTS = 429;                  // RFC 6585
	case HEADER_FIELDS_LARGE = 431;                // RFC 6585
	case UNAVAILABLE_FOR_LEGAL_REASONS = 451;      // RFC 7725
	
	// [Server Error 5xx]
	case INTERNAL_SERVER_ERROR = 500;
	case NOT_IMPLEMENTED = 501;
	case BAD_GATEWAY = 502;
	case SERVICE_UNAVAILABLE = 503;
	case GATEWAY_TIMEOUT = 504;
	case VERSION_NOT_SUPPORTED = 505;
	case VARIANT_ALSO_NEGOTIATES = 506;            // RFC 2295
	case INSUFFICIENT_STORAGE = 507;               // WebDAV; RFC 4918
	case LOOP_DETECTED = 508;                      // WebDAV; RFC 5842
	case NOT_EXTENDED = 510;                       // RFC 2774
	case NETWORK_AUTHENTICATION_REQUIRED = 511;    // RFC 6585
	
	
	public function message(): string
	{
		return match ($this) {
			self::CONTINUE => 'Continue',
			self::SWITCHING_PROTOCOLS => 'Switching Protocols',
			self::PROCESSING => 'Processing',
			self::EARLY_HINTS => 'Early Hints',
			self::OK => 'OK',
			self::CREATED => 'Created',
			self::ACCEPTED => 'Accepted',
			self::NON_AUTHORITATIVE_INFORMATION => 'Non-Authoritative Information',
			self::NO_CONTENT => 'No Content',
			self::RESET_CONTENT => 'Reset Content',
			self::PARTIAL_CONTENT => 'Partial Content',
			self::MULTI_STATUS => 'Multi-Status',
			self::ALREADY_REPORTED => 'Already Reported',
			self::IM_USED => 'IM Used',
			self::MULTIPLE_CHOICES => 'Multiple Choices',
			self::MOVED_PERMANENTLY => 'Moved Permanently',
			self::FOUND => 'Found',
			self::SEE_OTHER => 'See Other',
			self::NOT_MODIFIED => 'Not Modified',
			self::USE_PROXY => 'Use Proxy',
			self::SWITCH_PROXY => 'Switch Proxy',
			self::TEMPORARY_REDIRECT => 'Temporary Redirect',
			self::PERMANENT_REDIRECT => 'Permanent Redirect',
			self::BAD_REQUEST => 'Bad Request',
			self::UNAUTHORIZED => 'Unauthorized',
			self::PAYMENT_REQUIRED => 'Payment Required',
			self::FORBIDDEN => 'Forbidden',
			self::NOT_FOUND => 'Not Found',
			self::METHOD_NOT_ALLOWED => 'Method Not Allowed',
			self::NOT_ACCEPTABLE => 'Not Acceptable',
			self::PROXY_AUTHENTICATION_REQUIRED => 'Proxy Authentication Required',
			self::REQUEST_TIMEOUT => 'Request Timeout',
			self::CONFLICT => 'Conflict',
			self::GONE => 'Gone',
			self::LENGTH_REQUIRED => 'Length Required',
			self::PRECONDITION_FAILED => 'Precondition Failed',
			self::REQUEST_ENTITY_TOO_LARGE => 'Request Entity Too Large',
			self::REQUEST_URI_TOO_LONG => 'Request-URI Too Long',
			self::UNSUPPORTED_MEDIA_TYPE => 'Unsupported Media Type',
			self::REQUESTED_RANGE_NOT_SATISFIABLE => 'Requested Range Not Satisfiable',
			self::EXPECTATION_FAILED => 'Expectation Failed',
			self::IM_A_TEAPOT => 'I\'m a teapot',
			self::PAGE_EXPIRED => 'Page Expired',
			self::MISDIRECTED_REQUEST => 'Misdirected Request',
			self::UNPROCESSABLE_ENTITY => 'Unprocessable Entity',
			self::LOCKED => 'Locked',
			self::FAILED_DEPENDENCY => 'Failed Dependency',
			self::TOO_EARLY => 'Too Early',
			self::UPGRADE_REQUIRED => 'Upgrade Required',
			self::PRECONDITION_REQUIRED => 'Precondition Required',
			self::TOO_MANY_REQUESTS => 'Too Many Requests',
			self::HEADER_FIELDS_LARGE => 'Request Header Fields Too Large',
			self::UNAVAILABLE_FOR_LEGAL_REASONS => 'Unavailable For Legal Reasons',
			self::INTERNAL_SERVER_ERROR => 'Internal Server Error',
			self::NOT_IMPLEMENTED => 'Not Implemented',
			self::BAD_GATEWAY => 'Bad Gateway',
			self::SERVICE_UNAVAILABLE => 'Service Unavailable',
			self::GATEWAY_TIMEOUT => 'Gateway Timeout',
			self::VERSION_NOT_SUPPORTED => 'HTTP Version Not Supported',
			self::VARIANT_ALSO_NEGOTIATES => 'Variant Also Negotiates',
			self::INSUFFICIENT_STORAGE => 'Insufficient Storage',
			self::LOOP_DETECTED => 'Loop Detected',
			self::NOT_EXTENDED => 'Not Extended',
			self::NETWORK_AUTHENTICATION_REQUIRED => 'Network Authentication Required'
		};
	}
	
	public function fullMessage(): string
	{
		return sprintf('%d %s', $this->code(), $this->message());
	}
	
	public function code(): int
	{
		return $this->value;
	}
	
	public static function getMessage(int $code): string
	{
		return self::from($code)->message();
	}
	
	public static function getFullMessage(int $code): string
	{
		return self::from($code)->fullMessage();
	}
	
	public static function getCode(int $code): int
	{
		return self::from($code)->code();
	}
}