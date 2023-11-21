<?php

namespace App\Filament\Resources\TypeIsolationResource\Pages;

use App\Filament\Resources\TypeIsolationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeIsolation extends EditRecord
{
    protected static string $resource = TypeIsolationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
