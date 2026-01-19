
@php
    $contactMap = $contact->pluck('url', 'name');
@endphp
   <div class="space-y-4">
                <a href="#" class="text-2xl font-serif font-bold tracking-widest uppercase block">{{$contactMap['NameStore']}}</a>
                <p class="text-xs text-gray-500 leading-6">
                    Vietnam Office<br>
                    {{$contactMap['address']}}<br>
                </p>
                <p class="text-xs text-gray-500">{{$contactMap['Link']}}</p>
                <p class="text-xs text-gray-500">{{$contactMap['NumberPhone']}}</p>
                <div class="flex space-x-4 pt-2">
                    <a href="{{$contactMap['Facebook'] ?? '#' }}" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $contactMap['Instagram'] ?? '#' }}" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-github"></i></a>
                    <a href="{{ $contactMap['Zalo'] ?? '#' }}" class="text-gray-400 hover:text-black transition transform hover:-translate-y-1"><i class="fab fa-google"></i></a>
                </div>
            </div>
