@foreach($houses as $house)
    {{$house->landlord->name}}
    <br>
    {{$house->city}}
    <br>
    {{$house->address}}
    <br>
    <a href="{{ route('admin.houses.show',[$house->id]) }}">Perziureti</a>
    <hr>
@endforeach
@can('house_create')

<a href="{{ route('landlord.houses.create') }}">Prideti nama</a>

    @endcan