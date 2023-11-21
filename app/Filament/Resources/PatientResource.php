<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Models\Patient;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;


class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'healthicons-f-patient-band';

    public static function getLabel(): ?string
    {
        return __('Paciente');
    }

    public static function getNavigationLabel(): string
    {
        return __('Pacientes');
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

                TextInput::make('DNI')
                    ->required()
                    ->numeric()
                    ->minValue(100000)
                    ->maxValue(99999999)
                    ->label(__('DNI')),

                TextInput::make('HC')
                    ->required()
                    ->numeric()
                    ->minValue(33999)
                    ->maxValue(99999)
                    ->label(__('HC'))

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Nombre'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('DNI')
                    ->label(__('DNI'))
                    ->numeric()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('HC')
                    ->label(__('HC'))
                    ->numeric()
                    ->sortable()
                    ->searchable()
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
