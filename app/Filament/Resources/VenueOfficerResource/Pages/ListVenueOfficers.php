<?php

namespace App\Filament\Resources\VenueOfficerResource\Pages;

use App\Filament\Resources\VenueOfficerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVenueOfficers extends ListRecords
{
    protected static string $resource = VenueOfficerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
