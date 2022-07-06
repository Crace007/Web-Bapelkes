<table class="table table-hover">
    <tr>
      <th>Title</th>
      <th>:</th>
      <td>{{$data->title}}</td>
    </tr>
    <tr>
      <th>Penanggung Jawab</th>
      <th>:</th>
      <td>{{$data->user->name}}</td>
    </tr>
    <tr>
      <th>Isi Kegiatan</th>
      <th>:</th>
      <td>{{ strip_tags($data->body) }}</td>
    </tr>
</table>