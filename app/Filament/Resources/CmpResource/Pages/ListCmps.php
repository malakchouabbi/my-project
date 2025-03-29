<?php

namespace App\Filament\Resources\CmpResource\Pages;

use App\Filament\Resources\CmpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCmps extends ListRecords
{
    protected static string $resource = CmpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
