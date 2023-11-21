<?php

namespace App\Filament\Resources\GermResource\Pages;

use App\Filament\Resources\GermResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGerm extends EditRecord
{
    protected static string $resource = GermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
