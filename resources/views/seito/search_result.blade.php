@if($results->isEmpty())
        <p>検索結果が見つかりませんでした。</p>
    @else
        <ul>
            @foreach($results as $result)
                <li>{{ $result->field1 }} - {{ $result->field2 }}</li>
            @endforeach
        </ul>
    @endif