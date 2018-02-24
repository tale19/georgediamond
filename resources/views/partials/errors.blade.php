@if ($errors->any())
    <div>
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item" style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif