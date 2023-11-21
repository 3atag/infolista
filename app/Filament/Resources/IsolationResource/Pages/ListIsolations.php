<?php

namespace App\Filament\Resources\IsolationResource\Pages;

use App\Filament\Resources\IsolationResource;
use Filament\Actions;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Resources\Pages\ListRecords;

class ListIsolations extends ListRecords
{
    protected static string $resource = IsolationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    /* public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
        ];
    } */
}
