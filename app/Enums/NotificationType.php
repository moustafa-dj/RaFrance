<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self success()
 * @method static self error()
 * @method static self info()
 * @method static self warning()
 */
final class NotificationType extends Enum
{
    const SUCCESS = 'success';
    const ERROR = 'error';
    const WARNING = 'warning';
    const INFO = 'info';
}
