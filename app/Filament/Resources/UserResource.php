<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 10;

    public static function getNavigationGroup(): ?string
    {
        return __('System');
    }

    public static function getLabel(): ?string
    {
        return __('Usuario');
    }

    public static function getNavigationLabel(): string
    {
        return __('Usuarios');
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

                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(120)
                    ->unique(User::class, 'email', ignoreRecord: true)
                    ->label(__('Email')),

                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->options(Role::all()->pluck('name', 'id'))
                    ->required()
                    ->label(__('Roles')),

                Select::make('permissions')
                    ->relationship('permissions', 'name')
                    ->multiple()
                    ->options(Permission::all()->pluck('name', 'id'))
                    ->label(__('Permisos')),

                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->confirmed()
                    ->minLength(8)
                    ->maxLength(200)
                    ->label(__('Contraseña')),

                TextInput::make('password_confirmation')
                    ->password()
                    ->label(__('Confirmar contraseña')),

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
                    ->searchable()
                    ->description(fn (User $user) => $user->email),

                TextColumn::make('roles.name')
                    ->label(__('Roles'))
                    ->badge(),

                ToggleColumn::make('active')
                    ->label(__('Activo'))
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label(__('Creado'))
                    ->sortable()
                    ->date('d/m/Y H:i'),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
