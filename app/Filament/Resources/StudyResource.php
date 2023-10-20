<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyResource\Pages;
use App\Filament\Resources\StudyResource\RelationManagers;
use App\Models\Study;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudyResource extends Resource
{
    protected static ?string $model = Study::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getLabel(): ?string
    {
        return __('Estudio');
    }

    public static function getNavigationLabel(): string
    {
        return __('Estudios');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([

                        TextInput::make('dni')
                            ->autofocus()
                            ->required()
                            ->numeric()
                            ->minLength(6)
                            ->maxLength(8)
                            ->label(__('DNI'))
                            ->columns(1),

                        TextInput::make('name')
                            ->required()
                            ->minLength(3)
                            ->maxLength(90)
                            ->label(__('Nombre'))
                            ->columnSpan(3),

                        TextInput::make('study')
                            ->required()
                            ->minLength(3)
                            ->maxLength(90)
                            ->label(__('Estudio'))
                            ->columnSpan(3),

                        DatePicker::make('date')
                            ->required()
                            ->label(__('Fecha'))
                            ->columns(1),

                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->label(__('Informante'))
                            ->columnSpan(2),

                    ])->columns(10)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dni')
                    ->label(__('DNI')),

                TextColumn::make('name')
                    ->searchable()
                    ->label(__('Nombre')),

                TextColumn::make('study')
                    ->label(__('Estudio')),

                TextColumn::make('date')
                    ->date('d/m/Y')
                    ->label(__('Fecha')),

                TextColumn::make('user.name')
                    ->label(__('Informante')),

                TextColumn::make('status')
                    ->label(__('Estado'))
                    ->color(fn (string $state): string => match ($state) {
                        'pendiente' => 'warning',
                        'informado' => 'success',
                    }),
            ])
            ->filters([
                SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->label(__('Informante')),
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
            'index' => Pages\ListStudies::route('/'),
            'create' => Pages\CreateStudy::route('/create'),
            'edit' => Pages\EditStudy::route('/{record}/edit'),
        ];
    }
}
