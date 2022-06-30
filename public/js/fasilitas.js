function createFasilitas(id){
    document.getElementById('btn_tambahfasilitas').style.display = 'none';    
    document.getElementById('formfasilitas').style.display = 'block';  
    $.get('/admin/fasilitas/create?sarana=' + id , function (data, Status) {
        $('#formfasilitas').html(data);
    });
}

function cancelFasilitas(){
    $.get('/admin/blank', function (data, Status) {
        $('#formfasilitas').html(data);
    });
    document.getElementById('btn_tambahfasilitas').style.display = 'block';
}

function readFasilitas(id){
    document.getElementById('readtabelfasilitasfirst').style.display  = 'none';
    $.get('/admin/fasilitas?sarana=' + id, function (data, Status) {
        $('#readtabelfasilitas').html(data);
    })
}

function updateFasilitas(id){
    document.getElementById('btn_tambahfasilitas').style.display = 'none';
    document.getElementById('formfasilitas').style.display = 'block';    
    $.get('/admin/fasilitas/' + id +'/edit', function (data, Status) {
        $('#formfasilitas').html(data);
    })
}