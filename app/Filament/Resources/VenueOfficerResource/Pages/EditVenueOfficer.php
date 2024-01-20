<?php

namespace App\Filament\Resources\VenueOfficerResource\Pages;

use App\Filament\Resources\VenueOfficerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVenueOfficer extends EditRecord
{
    protected static string $resource = VenueOfficerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
