<?php

namespace App\Support;

use App\Types\PermissionType;

class PermissionHelper
{
    public function __construct(public string $model)
    {
    }

    public function view()
    {
        return PermissionType::VIEW->value() . ' ' . $this->model;
    }

    public function viewAny()
    {
        return PermissionType::VIEW_ANY->value() . ' ' . $this->model;
    }

    public function create()
    {
        return PermissionType::CREATE->value() . ' ' . $this->model;
    }

    public function update()
    {
        return PermissionType::UPDATE->value() . ' ' . $this->model;
    }

    public function delete()
    {
        return PermissionType::DELETE->value() . ' ' . $this->model;
    }

    public function replicate()
    {
        return PermissionType::REPLICATE->value() . ' ' . $this->model;
    }

    public function restore()
    {
        return PermissionType::RESTORE->value() . ' ' . $this->model;
    }

    public function forceDelete()
    {
        return PermissionType::FORCE_DELETE->value() . ' ' . $this->model;
    }
}
