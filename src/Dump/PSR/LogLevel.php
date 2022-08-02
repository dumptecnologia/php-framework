<?php

namespace Dump\PSR;

use Psr\Log\LogLevel as PsrLogLevel;

enum LogLevel: string
{
	case EMERGENCY = PsrLogLevel::EMERGENCY;
	case ALERT = PsrLogLevel::ALERT;
	case CRITICAL = PsrLogLevel::CRITICAL;
	case ERROR = PsrLogLevel::ERROR;
	case WARNING = PsrLogLevel::WARNING;
	case NOTICE = PsrLogLevel::NOTICE;
	case INFO = PsrLogLevel::INFO;
	case DEBUG = PsrLogLevel::DEBUG;
}