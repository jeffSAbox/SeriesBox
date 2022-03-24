@if( $errors->any() )
    <div class="alert alert-danger">
        <ul>
        @foreach( $errors->all() as $erro )
            <li>{{ $erro }}</li>
        @endforeach
        </ul>
    </div>
@endif