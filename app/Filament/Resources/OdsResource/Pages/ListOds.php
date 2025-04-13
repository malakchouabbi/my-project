<?php

namespace App\Filament\Resources\OdsResource\Pages;

use App\Filament\Resources\OdsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOds extends ListRecords
{
    protected static string $resource = OdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
