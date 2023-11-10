<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Filament\Resources\EventResource\RelationManagers\VenuesRelationManager;
use App\Filament\Resources\RegistrationResource\RelationManagers\RegistrationsRelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    TextInput::make('name')
                        ->placeholder('Event Name')
                        ->rules(['required', 'min:5', 'max:255']),

                    // TODO: Make start date not be in conflict with the start date of any other events
                    DatePicker::make('start_date')
                        ->minDate(now())
                        ->required()
                        ->maxDate(now()->addYears(2))
                        ->closeOnDateSelection(),
                    TextInput::make('duration')
                        ->label('Duration (Days)')
                        ->placeholder('Duration (Days)')
                        ->numeric()
                        ->rules(['min:1', 'max:5', 'required'])
                        ->label("Duration (Days)"),
                ]),
                Grid::make(1)->schema([
                    Textarea::make('description')
                        ->placeholder('Brief Description of Event')
                        ->rules(['required', 'min:20', 'max:64000']),
                ]),

                Toggle::make('allow_registration')
                    ->onIcon('heroicon-o-check')
                    ->offIcon('heroicon-o-x-mark')
                    ->onColor('success')
                    ->reactive()
                    ->helperText("Allows registration to this event"),

                Toggle::make('allow_registration_from_external_students')
                    ->onIcon('heroicon-o-check')
                    ->offIcon('heroicon-o-x-mark')
                    ->onColor('success')
                    ->disabled(fn(callable $get) => !$get('allow_registration'))
                    ->helperText("Allows outside students to register to this event"),

            ]);
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->limit(20),
                TextColumn::make('description')
                    ->limit(20),
                TextColumn::make('start_date'),
                IconColumn::make('allow_registration')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                IconColumn::make('allow_registration_from_external_students')
                    ->label('Allow Non-CSPC Students')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                TextColumn::make('duration')
                    ->label('Duration (Days)'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            VenuesRelationManager::class,
            RegistrationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
