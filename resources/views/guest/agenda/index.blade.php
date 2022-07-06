<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    {{-- my style --}}
    <link rel="stylesheet" href="/css/style.css">
    <!-- fullcalendar css  -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />

    <link rel="icon" href={{ asset('storage/default_image/favicon.png')}} type="png/x-icon">
    <title>{{$title}}</title>
</head>

<body class="bg-gradient-body">
  {{-- <div id="demo" class="body-stiky d-flex flex-column bd-highlight"> --}}
  <div style="min-height:100vh; display:flex; flex-direction:column; 
  justify-content:space-between;">
    <div>
      {{-- navbar --}}
      @include('guest.layouts.navbar')
  
      {{-- content --}}
      <article class="container content ">
        
        <!-- Modal -->
        <div class="modal fade" id="modelKalender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Info Agenda</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div id="page"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
        
        {{-- isi --}}
        <div class="row my-3">
            <div class="card">
                <div class="card-body">
                  <h1 class="card-title text-center">AGENDA KEGIATAN</h1>
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </article>
    </div>
    

     <!-- Footer -->
     <footer>
       @include('guest.layouts.footer')
     </footer>
  </div>
      
    
  {{-- </div> --}}

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- fullcalender --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function () {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale: 'id',
              headerToolbar: {
                start: 'prev,next today',
                center: 'title',
                end: 'dayGridMonth,dayGridWeek,dayGridDay,dayGridlist'
              },
              buttonText: {
                today : 'Hari Ini',
                month : 'Bulanan',
                week  : 'Mingguan',
                day   : 'Harian',
              },
              events: [ 
                <?php foreach ($agenda as $item):?>
                {
                  title: '{{$item->title}}', //menampilkan title dari tabel
                  slug: '{{$item->slug}}', //menampilkan slug dari tabel
                  start: '{{$item->tanggal_mulai}}', //menampilkan tgl mulai dari tabel
                  end: '{{$item->tanggal_selesai}}' //menampilkan tgl selesai dari tabel
                },
                <?php endforeach; ?>
              ],
              selectable: true,
              eventClick: function(info){ 
                var slug = info.event.extendedProps.slug;
                $.get('/agenda/' + slug, function (data, Status) {
                  $('#page').html(data);
                  $('#modelKalender').modal('toggle');
                })
              },
              selectOverlap: function (event) {
                  return event.rendering === 'background';
              }
          });
          calendar.render();
      });
    </script>
  </body>

  </html>