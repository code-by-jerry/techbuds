<x-mail::message>
# New Contact Request

You have received a new contact request from **{{ $contact->name }}**.

## Contact Details

**Name:** {{ $contact->name }}  
**Email:** {{ $contact->email }}  
@if($contact->phone)
**Phone:** {{ $contact->phone }}  
@endif
@if($contact->project_type)
**Project Type:** {{ $contact->project_type }}  
@endif
@if($contact->nda_requested)
**NDA Requested:** Yes  
@endif

@if($contact->message)
## Message

{{ $contact->message }}
@endif

<x-mail::button :url="route('admin.contacts.show', $contact)">
View Contact Request
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
