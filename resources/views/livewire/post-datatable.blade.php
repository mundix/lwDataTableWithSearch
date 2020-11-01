<div>
    <table class="table table-striped">
        <thead>
            @foreach( $headers ?? [] as $key => $value)
                <th>
                    {{ $value }}
                </th>
            @endforeach
        </thead>
        <tbody>
            @if(count($data))
                @foreach($data as $item)
                    <tr>
                        {{-- The key on header, is the fields name on post,
                            that's is why get fetched  --}}
                        @foreach($headers as $key => $value)
                            <td>
                                {{ $item->$key  }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    {{ $data->links('pagination::bootstrap-4') }}
</div>
