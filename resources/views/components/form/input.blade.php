@empty(!$label)
<label for="{{$name}}" class="form-label">{{$label}}</label>
@endempty
<input 
    id="{{$id}}" class="form-control {{$addClasses}}"
    type="{{$type}}" name="{{$name}}"
    value={{$value}} placeholder="{{$placeholer}}"

    {{$addAttributes}}
>
{{$slot}}