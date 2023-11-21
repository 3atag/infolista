<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeIsolationResource\Pages;
use App\Filament\Resources\TypeIsolationResource\RelationManagers;
use App\Models\TypeIsolation;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeIsolationResource extends Resource
{
    protected static ?string $model = TypeIsolation::class;

    protected static ?string $navigationIcon = 'healthicons-f-virus-lab-research-test-tube';



    public static function getNavigationGroup(): ?string
    {
        return __('Configuración');
    }


    public static function getLabel(): ?string
    {
        return __('Tipo de aislamiento');
    }

    public static function getNavigationLabel(): string
    {
        return __('Tipos de aislamientos');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->autofocus()
                    ->required()
                    ->maxLength(90)
                    ->label(__('Nombre')),


                Checkbox::make('active')
                    ->label(__('Activo')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Nombre'))
                    ->sortable()
                    ->sortable(),

                ToggleColumn::make('active')
                    ->label(__('Activo'))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTypeIsolations::route('/'),
            'create' => Pages\CreateTypeIsolation::route('/create'),
            'edit' => Pages\EditTypeIsolation::route('/{record}/edit'),
        ];
    }
}
