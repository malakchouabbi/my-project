<?php

namespace App\Filament\Resources\OdsResource\Pages;

use App\Filament\Resources\OdsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOds extends EditRecord
{
    protected static string $resource = OdsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
