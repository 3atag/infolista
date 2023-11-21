<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IsolationResource\Pages;
use App\Models\Germ;
use App\Models\Isolation;
use App\Models\Patient;
use App\Models\TypeGerm;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;


class IsolationResource extends Resource
{
    protected static ?string $model = Isolation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getLabel(): ?string
    {
        return __('Aislamiento');
    }

    public static function getNavigationLabel(): string
    {
        return __('Aislamientos');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->searchable(['name', 'DNI', 'HC'])
                    ->disabled('edit')
                    ->relationship('patient', 'name')
                    ->createOptionForm([

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

                    ])

                    ->required()
                    ->label(__('Paciente'))
                    ->columnSpan(2),

                Select::make('germ_id')
                    ->relationship('germ', 'name')
                    ->required()
                    ->label(__('Germen'))
                    ->columnSpan(2),

                DatePicker::make('detection_date')
                    ->required()
                    ->label(__('Fecha de detección'))
                    ->columns(1),

                Checkbox::make('admitted')
                    ->label(__('Internado'))

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.HC')
                    ->label(__('HC'))
                    ->searchable(),

                TextColumn::make('patient.name')
                    ->label(__('Paciente'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('patient.DNI')
                    ->label(__('DNI'))
                    ->searchable(),

                TextColumn::make('germ.type_isolation.name')
                    ->label(__('Tipo de aislamiento'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('germ.name')
                    ->label(__('Germen'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('detection_date')
                    ->date('d/m/Y')
                    ->label(__('Fecha de detección')),

                ToggleColumn::make('admitted')
                    ->label(__('Internado'))
                    ->sortable(),




            ])
            ->filters([])
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
            'index' => Pages\ListIsolations::route('/'),
            'create' => Pages\CreateIsolation::route('/create'),
            'edit' => Pages\EditIsolation::route('/{record}/edit'),
        ];
    }
}
