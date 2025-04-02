<?php

namespace App\Filament\Resources\ProjetResource\Pages;

use App\Filament\Resources\ProjetResource;
use App\Models\Projet;
use App\Models\TravailProjet;
use Filament\Resources\Pages\Page;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;


class ViewProjet extends Page
{
    protected static string $resource = ProjetResource::class;
    protected static string $view = 'filament.pages.view-projet';

    public Projet $record;
    public $travaux;

    public function mount(Projet $record)
    {
        $this->record = $record;
        $this->travaux = TravailProjet::where('id_projet', $record->id_projet)->get();
    }

    protected function getHeaderActions(): array
{
    return [
        Action::make('edit')
            ->label('Modifier Projet')
            ->icon('heroicon-o-pencil')
            ->url(fn () => route('filament.dashboard.resources.projets.edit', ['record' => $this->record->id_projet])),
    ];
}


    public function table(Table $table): Table
    {
        return $table
            ->query(TravailProjet::where('id_projet', $this->record->id_projet))
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Titre'),
                Tables\Columns\TextColumn::make('description')->label('Description'),
                Tables\Columns\TextColumn::make('status')->label('État')->badge(),
                Tables\Columns\TextColumn::make('latitude')->label('Latitude'),
                Tables\Columns\TextColumn::make('longitude')->label('Longitude'),
            ]);
    }
}
