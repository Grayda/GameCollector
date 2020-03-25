{{-- This is used to show an edit link for collections and such --}}
@auth
  <a href="/collect/resources/{{ Str::plural($type ?? 'collections') }}/"><i class="fas fa-eye"></i> View All {{ Str::plural(Str::ucfirst($type)) }}</a> | <a href="/collect/resources/{{ Str::plural($type ?? 'collections') }}/{{ $id }}/edit"><i class="fas fa-edit"></i> Edit This {{ Str::singular(Str::ucfirst($type)) }}</a>
@endauth
