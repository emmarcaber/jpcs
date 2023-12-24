<?php

namespace App\Types;

enum PermissionType
{
    case CREATE;
    case VIEW;
    case VIEW_ANY;
    case UPDATE;
    case DELETE;
    case REPLICATE;
    case RESTORE;
    case FORCE_DELETE;

    function value()
    {
        return match ($this) {
            self::CREATE => 'create',
            self::VIEW => 'view',
            self::VIEW_ANY => 'view any',
            self::UPDATE => 'update',
            self::DELETE => 'delete',
            self::REPLICATE => 'replicate',
            self::RESTORE => 'restore',
            self::FORCE_DELETE => 'force delete',
        };
    }
}
