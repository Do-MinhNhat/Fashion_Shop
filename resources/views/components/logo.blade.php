@php
    use App\Models\Contact;
    $contact = Contact::where('status', true)->get();
    $map = $contact->pluck('url', 'name');
@endphp

<a href="{{ route('user.home.index') }}" class="text-3xl  font-bold tracking-widest uppercase flex items-center gap-3">
    <img src="{{ asset('logo.jpg') }}" alt="Fashion Shop" class="w-20 h-auto">
    {{ $map->get('NameStore', 'Không có') }}.
</a>
