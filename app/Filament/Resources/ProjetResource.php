<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjetResource\Pages;
use App\Models\Projet;
use App\Models\CMP;
use App\Models\Entreprise;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;


class ProjetResource extends Resource
{
    protected static ?string $model = Projet::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('titre_projet')
                   ->label('Titre Projet')
                   ->required()
                   ->maxLength(255),

                 DatePicker::make('date_debut')
                    ->label('Date Début')
                    ->required(),

                 DatePicker::make('date_fin')
                    ->label('Date Fin')
                    ->required(),
                    
                 TextInput::make('duree')
                    ->label('Durée (jours)')
                    ->numeric()
                    ->required(),   

                    Select::make('etat_projet')
    ->label('État Projet')
    ->options([
        'en cours' => 'En cours',
        'suspendu' => 'Suspendu',
        'finalisé' => 'Finalisé',
    ])
    ->default('en cours')
    ->required(),

                    Select::make('id_cmp')
                    ->label('CMP')
                    ->options(CMP::all()->pluck('nom_cmp', 'id_cmp'))
                    ->searchable()
                    ->reactive()
                    ->required(),

                Select::make('id_entreprise')
                    ->label('Entreprise')
                    ->options(Entreprise::all()->pluck('nom_entreprise', 'id_entreprise'))
                    ->searchable()
                    ->reactive()
                    ->required(),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('titre_projet')->label('Titre Projet')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('cmp.nom_cmp')->label('CMP')->sortable(),
                Tables\Columns\TextColumn::make('entreprise.nom_entreprise')->label('Entreprise')->sortable(),
                Tables\Columns\TextColumn::make('date_debut')->label('Date Début')->sortable(),
                Tables\Columns\TextColumn::make('etat_projet')
                ->label('État')
                  ->badge()
                  ->color(fn (string $state): string => match ($state) {
                   'en cours' => 'warning',
                   'suspendu' => 'danger',
                   'finalisé' => 'success',
                      })
    ->sortable(),

            ])
            ->filters([])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getPanel(): ?string
    {
        return 'dashboard'; // ✅ تأكد أن panel هو dashboard
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjets::route('/'),
            'create' => Pages\CreateProjet::route('/create'),
            'edit' => Pages\EditProjet::route('/{record}/edit'),
        ];
    }
}
