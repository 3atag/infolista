<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GermResource\Pages;
use App\Filament\Resources\GermResource\RelationManagers;
use App\Models\Germ;
use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class GermResource extends Resource
{
    protected static ?string $model = Germ::class;

    protected static ?string $navigationIcon = 'iconpark-germs-o';

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): ?string
    {
        return __('Configuración');
    }

    public static function getLabel(): ?string
    {
        return __('Germen');
    }

    public static function getNavigationLabel(): string
    {
        return __('Germenes');
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

                Select::make('type_isolation_id')
                    ->relationship('typeisolation', 'name')
                    ->required()
                    ->label(__('Tipo de Aislamiento'))
                    ->columnSpan(2),

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
                    ->sortable(),

                TextColumn::make('type_isolation.name')
                    ->label(__('Tipo de Aislamiento'))
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
            'index' => Pages\ListGerms::route('/'),
            'create' => Pages\CreateGerm::route('/create'),
            'edit' => Pages\EditGerm::route('/{record}/edit'),
        ];
    }
}
