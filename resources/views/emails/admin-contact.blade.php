@component('mail::message')
# New Contact Inquiry Received

You have received a new message from the SafeNest contact form.

**Sender Details:**
* **Name:** {{ $contact->name }}
* **Email:** {{ $contact->email }}

**Message:**
> {{ $contact->message }}

@component('mail::button', ['url' => route('admin.contacts.index')])
View in Admin Panel
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent