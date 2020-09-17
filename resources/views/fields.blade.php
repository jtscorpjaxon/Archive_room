<select name="field">
    @foreach($fields as $field)
        <option value="{{$field->id}}">
            {{ $field->name }}
        </option>
    @endforeach
</select>