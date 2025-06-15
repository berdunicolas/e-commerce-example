@empty(!$label)
<label for="{{$name}}" class="form-label">{{$label}}</label>
@endempty
<select 
    id="{{$id}}" class="form-select {{$addClasses}}"
    name="{{$name}}"

    {{$addAttributes}}
>
    {{$slot}}
</select>