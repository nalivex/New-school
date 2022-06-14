<?php

namespace App\Filament\Traits;

use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\IconButtonAction;

trait HasDeleteButton
{
    protected function getDeleteAction(): ?Action
    {
        return IconButtonAction::make('delete')
            ->color('danger')
            ->icon('heroicon-o-trash')
            ->label('Excluir')
            ->requiresConfirmation()
            ->action(fn($record) => $record->delete());
    }
}
