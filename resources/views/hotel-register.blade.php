<x-layout>
    <div class="max-w-2xl mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Become a Hotel Partner</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hotel.register.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-lg border">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Owner Full Name</label>
                <input type="text" name="owner_name" required class="w-full border-gray-300 rounded-lg p-2.5 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required class="w-full border-gray-300 rounded-lg p-2.5 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone" required class="w-full border-gray-300 rounded-lg p-2.5 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Hotel Name</label>
                <input type="text" name="hotel_name" required class="w-full border-gray-300 rounded-lg p-2.5 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">City / Location</label>
                <input type="text" name="city" required class="w-full border-gray-300 rounded-lg p-2.5 border">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Additional Details</label>
                <textarea name="message" rows="4" class="w-full border-gray-300 rounded-lg p-2.5 border"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
                Submit Application
            </button>
        </form>
    </div>
</x-layout>