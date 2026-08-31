<x-layout :title="$hotel->name">
    <div class="bg-gray-50 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Header Section -->
            <div class="bg-white rounded-2xl p-6 sm:p-8 border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start gap-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900">{{ $hotel->name }}</h1>
                    <p class="text-gray-500 text-sm flex items-center gap-1 mt-2">
                        <i class="ri-map-pin-line text-indigo-600"></i> {{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->destination }}
                    </p>
                    @if($hotel->tagline)
                        <p class="text-indigo-600 font-medium text-sm mt-1">{{ $hotel->tagline }}</p>
                    @endif
                </div>
                <div class="flex items-center bg-amber-50 text-amber-600 px-4 py-2 rounded-xl text-lg font-bold">
                    <i class="ri-star-fill mr-1"></i> {{ number_format($hotel->star_rating, 1) }}
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Featured Main Image -->
                <div class="md:col-span-2 aspect-[16/10] overflow-hidden rounded-2xl">
                    <img src="{{ $hotel->featured_image ? (Str::startsWith($hotel->featured_image, ['http://', 'https://']) ? $hotel->featured_image : Storage::url($hotel->featured_image)) : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800' }}" 
                         class="w-full h-full object-cover" 
                         alt="{{ $hotel->name }}"
                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&q=80&w=800';">
                </div>

                <!-- Gallery Thumbnails -->
                <div class="grid grid-cols-2 md:grid-cols-1 gap-4">
                    @if(is_array($hotel->gallery_images))
                        @foreach(array_slice($hotel->gallery_images, 0, 2) as $img)
                            <div class="aspect-[16/10] overflow-hidden rounded-2xl">
                                <img src="{{ Str::startsWith($img, ['http://', 'https://']) ? $img : Storage::url($img) }}" 
                                     class="w-full h-full object-cover" 
                                     alt="Hotel Gallery Image">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Available Rooms Section -->
            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-gray-900">Available Rooms</h2>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    @forelse($hotel->rooms as $room)
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-4 flex flex-col justify-between">
                            <div>
                                <div class="aspect-[16/10] overflow-hidden rounded-xl mb-4">
                                    <img src="{{ $room->featured_image ? (Str::startsWith($room->featured_image, ['http://', 'https://']) ? $room->featured_image : Storage::url($room->featured_image)) : 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800' }}" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ $room->name }}"
                                         onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&q=80&w=800';">
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">{{ $room->name }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $room->category ?? 'Standard Room' }} • {{ $room->bed_type ?? '1 King Bed' }}</p>
                                <p class="text-indigo-600 font-bold text-lg mt-2">NPR {{ number_format($room->price_per_night) }} <span class="text-xs font-normal text-gray-500">/ night</span></p>
                            </div>

                            <!-- Clickable Route Link to Room Detail / Booking Page -->
                            <a href="{{ route('rooms.show', $room) }}" 
                               class="block text-center w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-xl transition shadow-sm">
                                View & Book Room
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-2xl p-8 text-center text-gray-500 border border-gray-100">
                            No rooms are currently available for this hotel.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-layout>