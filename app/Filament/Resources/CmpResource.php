<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CmpResource\Pages;
use App\Filament\Resources\CmpResource\RelationManagers;
use App\Models\Cmp;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CmpResource extends Resource
{
    protected static ?string $model = Cmp::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                    TextInput::make('nom_cmp')
                        ->label('Nom CMP')
                        ->required(),
                    TextInput::make('localisation')
                        ->label('Localisation')
                        ->required(),
                    TextInput::make('responsable')
                        ->label('Responsable')
                        ->required(),
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCmps::route('/'),
            'create' => Pages\CreateCmp::route('/create'),
            'edit' => Pages\EditCmp::route('/{record}/edit'),
        ];
    }
}
