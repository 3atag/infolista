<?php

namespace App\Filament\Resources\TypeIsolationResource\Pages;

use App\Filament\Resources\TypeIsolationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeIsolations extends ListRecords
{
    protected static string $resource = TypeIsolationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
