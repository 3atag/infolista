<?php

namespace App\Filament\Resources\GermResource\Pages;

use App\Filament\Resources\GermResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGerms extends ListRecords
{
    protected static string $resource = GermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
