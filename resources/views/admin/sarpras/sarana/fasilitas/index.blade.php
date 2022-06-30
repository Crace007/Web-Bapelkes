<table class="table table-hover table-sm" id="readtabelfasilitasfirst">
    <thead class="text-center table-dark">
    <tr>
        <th>No.</th>
        <th>Nama Fasilitas</th>
        <th>Jumlah unit</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php $n = 1 ?>
        @foreach ($data as $item)
            @if ($item->sarana_id == request('sarana'))
                <tr>
                    <td class="text-center">{{$n++}}</td>
                    <td>{{$item->fasilitas}}</td>
                    <td class="text-center">{{$item->unit}}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" onclick="updateFasilitas({{$item->id}})">edit</button>
                        <form action="/admin/fasilitas/{{$item->id}}" method="POST" class="d-inline">
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