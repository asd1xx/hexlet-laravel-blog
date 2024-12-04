@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>{{ html()->label('Имя', 'name') }}</p>
<p>{{ html()->input('text', 'name') }}</p>
<p>{{ html()->label('Содержание', 'body') }}</p>
<p>{{ html()->textarea('body') }}</p>