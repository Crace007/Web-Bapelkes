<table class="table table-hover table-sm" id="tabel_materiPelatihan">
    <thead class="text-center table-dark">
        <td>Nama Materi</td>
        <td>Pelatihan id</td>
        <td>Update by</td>
        <td>action</td>
    </thead>
    @foreach ($data as $item)
        @if ($item->pelatihan_id == request('pelatihan'))
            <tr class="text-center">
                <td>{{$item->nama}}</td>
                <td>{{$item->pelatihan_id}}</td>
                <td>{{$item->upload_by}}</td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="updateMateri({{$item->id}})">edit</button>
                    <form action="/admin/materipelatihans/{{$item->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">delete</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
</table>