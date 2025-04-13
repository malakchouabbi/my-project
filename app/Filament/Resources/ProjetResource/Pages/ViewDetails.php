<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use App\Filament\Resources\ProjetResource;
use Filament\Resources\Pages\ViewRecord;

class ViewDetails extends ViewRecord
{
    protected static string $resource = ProjetResource::class;
    protected static string $view = 'filament.resources.projet-resource.pages.view-details';
}