function createfotosarana(id){
    document.getElementById('btn_tambahfotosarana').style.display = 'none';    
    document.getElementById('formfotosarana').style.display = 'block';  
    $.get('/admin/fotosarana/create?sarana=' + id , function (data, Status) {
        $('#formfotosarana').html(data);
    });
}

function cancelfotosarana(){
    $.get('/admin/blank', function (data, Status) {
        $('#formfotosarana').html(data);
    });
    // document.getElementById('formfotosarana').style.display = 'none';
    document.getElementById('btn_tambahfotosarana').style.display = 'block';
}

function readfotosarana(id){
    document.getElementById('readtabelfotosaranafirst').style.display  = 'none';
    $.get('/admin/fotosarana?sarana=' + id, function (data, Status) {
        $('#readtabelfotosarana').html(data);
    })
}

function updatefotosarana(id){
    document.getElementById('btn_tambahfotosarana').style.display = 'none';
    document.getElementById('formfotosarana').style.display = 'block';    
    $.get('/admin/fotosarana/' + id +'/edit', function (data, Status) {
        $('#formfotosarana').html(data);
    })
}