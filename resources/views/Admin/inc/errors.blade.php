

    @if ($errors->any())
            {{-- // ->بترجع ترو لو في ايرور ف السيشن --}}
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
