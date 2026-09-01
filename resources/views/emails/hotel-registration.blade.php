<h2>New Hotel Registration Request</h2>
<p><strong>Owner Name:</strong> {{ $requestData->owner_name }}</p>
<p><strong>Email:</strong> {{ $requestData->email }}</p>
<p><strong>Phone:</strong> {{ $requestData->phone }}</p>
<p><strong>Hotel Name:</strong> {{ $requestData->hotel_name }}</p>
<p><strong>City:</strong> {{ $requestData->city }}</p>
<p><strong>Message:</strong> {{ $requestData->message ?? 'N/A' }}</p>