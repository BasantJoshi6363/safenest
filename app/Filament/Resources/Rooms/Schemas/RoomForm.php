<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('Basic Information')
                            ->schema([
                                Select::make('hotel_id')
                                    ->relationship('hotel', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Select::make('category')
                                    ->options([
                                        'Deluxe Suite' => 'Deluxe Suite',
                                        'Mountain View' => 'Mountain View',
                                        'Family Room' => 'Family Room',
                                        'Standard Room' => 'Standard Room',
                                    ])
                                    ->required()
                                    ->searchable(),

                                Textarea::make('description')
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Section::make('Specifications & Pricing')
                            ->schema([
                                TextInput::make('max_guests')
                                    ->numeric()
                                    ->default(2)
                                    ->required(),

                                Select::make('bed_type')
                                    ->options([
                                        '1 King Bed' => '1 King Bed',
                                        '1 Queen Bed' => '1 Queen Bed',
                                        '2 Double Beds' => '2 Double Beds',
                                        'Single Bed' => 'Single Bed',
                                    ])
                                    ->required(),

                                Grid::make(2)->schema([
                                    TextInput::make('size')
                                        ->numeric()
                                        ->placeholder('e.g. 42'),

                                    TextInput::make('size_unit')
                                        ->default('m²')
                                        ->required(),
                                ]),

                                TextInput::make('price_per_night')
                                    ->numeric()
                                    ->prefix('NPR')
                                    ->required(),
                                TextInput::make('total_rooms')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),

                                TextInput::make('available_rooms')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('rooms/featured')
                                    ->maxSize(2048)
                                    ->columnSpanFull(),

                                FileUpload::make('gallery_images')
                                    ->label('Gallery Images')
                                    ->image()
                                    ->multiple()
                                    ->reorderable()
                                    ->disk('public')
                                    ->directory('rooms/gallery')
                                    ->maxFiles(5)
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Section::make('Room Amenities & Features')
                            ->description('Select amenities available in this room unit.')
                            ->schema([
                                Toggle::make('balcony')->label('Private Balcony'),
                                Toggle::make('wifi')->label('Free High-Speed Wi-Fi')->default(true),
                                Toggle::make('smart_tv')->label('Smart TV'),
                                Toggle::make('breakfast')->label('Complimentary Breakfast'),
                                Toggle::make('coffee_machine')->label('Coffee Machine'),
                                Toggle::make('air_conditioning')->label('Air Conditioning'),
                                Toggle::make('room_heater')->label('Room Heater'),
                                Toggle::make('private_bathroom')->label('En-suite Bathroom')->default(true),
                                Toggle::make('toiletries')->label('Modern Toiletries'),
                                Toggle::make('garden_access')->label('Courtyard Garden Access'),
                                Toggle::make('lounge_area')->label('Lounge Area'),
                                Toggle::make('meals_included')->label('All Meals Included'),
                                Toggle::make('safari_guidance')->label('Jungle Safari Guidance'),
                                Toggle::make('mini_bar')->label('Mini Bar'),
                                Toggle::make('refreshments')->label('Complimentary Refreshments'),
                            ])->columns(3),
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Inventory & Status')
                            ->schema([
                                TextInput::make('total_rooms')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),

                                TextInput::make('available_rooms')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),

                                Toggle::make('is_active')
                                    ->label('Active on Site')
                                    ->default(true),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}