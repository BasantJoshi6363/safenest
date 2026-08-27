<?php

namespace App\Filament\Resources\Hotels\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class HotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make('General Information')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                TextInput::make('tagline')
                                    ->placeholder('e.g., Luxury stay near Fewa Lake')
                                    ->columnSpanFull(),

                                Textarea::make('description')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])->columns(2),

                        Section::make('Location Details')
                            ->schema([
                                TextInput::make('destination')
                                    ->required()
                                    ->placeholder('e.g., Pokhara, Kathmandu, Chitwan'),

                                TextInput::make('city')
                                    ->placeholder('e.g., Pokhara'),

                                TextInput::make('address')
                                    ->required()
                                    ->placeholder('e.g., Lakeside-6')
                                    ->columnSpanFull(),

                                Grid::make(2)->schema([
                                    TextInput::make('latitude')
                                        ->numeric()
                                        ->placeholder('28.2096'),

                                    TextInput::make('longitude')
                                        ->numeric()
                                        ->placeholder('83.9856'),
                                ]),
                            ])->columns(2),

                        Section::make('Media & Gallery')
                            ->schema([
                                FileUpload::make('featured_image')
                                    ->disk('public')
                                    ->directory('hotels/featured')
                                    ->visibility('public')
                                    ->image()
                                    ->required(),

                                FileUpload::make('gallery_images')
                                    ->disk('public')
                                    ->directory('hotels/gallery')
                                    ->visibility('public')
                                    ->image()
                                    ->multiple()
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Hotel Amenities')
                            ->description('Select all features available at this property.')
                            ->schema([
                                Toggle::make('free_wifi')->label('Free Wi-Fi')->default(true),
                                Toggle::make('swimming_pool')->label('Swimming Pool'),
                                Toggle::make('spa_wellness')->label('Spa & Wellness'),
                                Toggle::make('fitness_center')->label('Fitness Center'),
                                Toggle::make('restaurant')->label('Restaurant'),
                                Toggle::make('bar_lounge')->label('Bar / Lounge'),
                                Toggle::make('parking')->label('Parking')->default(true),
                                Toggle::make('airport_shuttle')->label('Airport Shuttle'),
                                Toggle::make('pet_friendly')->label('Pet Friendly'),
                                Toggle::make('room_service')->label('Room Service'),
                            ])->columns(3),
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Contact Information')
                            ->schema([
                                TextInput::make('phone')
                                    ->tel(),

                                TextInput::make('email')
                                    ->email(),

                                TextInput::make('website')
                                    ->url()
                                    ->placeholder('https://example.com'),
                            ]),

                        Section::make('Policies & Rating')
                            ->schema([
                                Select::make('star_rating')
                                    ->options([
                                        1 => '1 Star',
                                        2 => '2 Stars',
                                        3 => '3 Stars',
                                        4 => '4 Stars',
                                        5 => '5 Stars',
                                    ])
                                    ->default(3)
                                    ->required(),

                                TimePicker::make('check_in_time')
                                    ->default('14:00')
                                    ->required(),

                                TimePicker::make('check_out_time')
                                    ->default('12:00')
                                    ->required(),

                                Textarea::make('cancellation_policy')
                                    ->rows(3),
                            ]),

                        Section::make('Visibility & Status')
                            ->schema([
                                Toggle::make('is_featured')
                                    ->label('Featured Hotel')
                                    ->default(false),

                                Toggle::make('is_active')
                                    ->label('Active on Site')
                                    ->default(true),
                            ]),
                    ])->columnSpan(1),
            ])->columns(3);
    }
}