<?php

namespace yashveersingh\shellhubPHP\src\Enum;

enum ShellHubDeviceStatusEnum: int
{
    case ACCEPTED = 1;
    case REJECTED = 2;
    case PENDING = 3;
    case REMOVED = 4;
    case UNUSED = 5;
}