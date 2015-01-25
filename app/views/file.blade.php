

{{ Form::open(array('url' => '/post', 'method' => 'post')) }}
    <p>
        {{ Form::label('File') }}
        {{ Form::file('fajl') }}
    </p>

    {{ Form::submit('Create Category') }}
    {{ Form::close() }}
