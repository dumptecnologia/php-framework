<?php

namespace Dump\Http;


enum ContentDisposition: string
{
	case INLINE = 'inline';
	case ATTACHMENT = 'attachment';
}