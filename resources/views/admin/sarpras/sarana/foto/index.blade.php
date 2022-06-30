<table class="table table-hover table-sm" id="readtabelfotosaranafirst">
    <thead class="text-center table-dark">
        <tr>
            <th>Foto Sarana</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            @if ($item->sarana_id == request('sarana'))
                <tr class="text-center">
                    <td><img src="{{asset('storage/' . $item->foto)}}" height="50px" width="auto" alt=""> </td>
                    <td class="text-center">{{$item->nama}}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" onclick="updatefotosarana({{$item->id}})">edit</button>
                        <form action="/admin/fotosarana/{{$item->id}}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>