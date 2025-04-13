<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OdsResource\Pages;
use App\Models\Projet;
use App\Filament\Resources\OdsResource\RelationManagers;
use App\Models\Ods;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OdsResource extends Resource
{
    protected static ?string $model = Ods::class;
    
    protected static ?string $navigationLabel = 'Order de Service';
   
    protected static ?int $navigationSort = 2;  // ترتيب العنصر في الشريط الجانبي


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('id_projet')
                ->label('Projet')
                ->options(Projet::all()->pluck('titre_projet', 'id_projet'))
                ->required(),

            Forms\Components\TextInput::make('num_ods')
                ->label('Numéro ODS')
                ->required()
                ->maxLength(50),

            Forms\Components\TextInput::make('num_bon_commande')
                ->label('Numéro Bon de Commande')
                ->required()
                ->maxLength(50),

            Forms\Components\DatePicker::make('date_bon_commande')
                ->label('Date du Bon de Commande')
                ->required(),

            Forms\Components\DatePicker::make('date_ods')
                ->label('Date ODS')
                ->required(),

            Forms\Components\DatePicker::make('date_commence_execution')
                ->label('Date de début d\'exécution')
                ->required(),

            Forms\Components\TextInput::make('site_projet')
                ->label('Site du Projet')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('objet')
                ->label('Objet / Description')
                ->required(),

            
            
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            
            Tables\Columns\TextColumn::make('num_ods')->label('Numéro ODS'),
            
            
            Tables\Columns\TextColumn::make('projet.titre_projet')->label('Titre du projet'),
            
            
            Tables\Columns\TextColumn::make('site_projet')->label('Site du projet'),
            
            
            Tables\Columns\TextColumn::make('date_commence_execution')
                ->label('Date de démarrage')
                ->date(),
        ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make()
                        ->label('Modifier'),
    
                    DeleteAction::make()
                        ->label('Supprimer'),
    
                    Action::make('Télécharger')
                        ->label('Télécharger PDF')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->url(fn (Ods $record) => route('ods.imprimer', $record))
                        ->openUrlInNewTab(),
                ])
                ->icon('heroicon-o-ellipsis-vertical'), // أيقونة ثلاث نقاط
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOds::route('/'),
            'create' => Pages\CreateOds::route('/create'),
            'edit' => Pages\EditOds::route('/{record}/edit'),
        ];
    }
}
