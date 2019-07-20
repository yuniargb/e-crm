@foreach($dtl as $d)
@if($d->sender == $invId)
<p class="text-right">{{ date('H:i', strtotime($d->created_at)) }}</p>
<div class="text-right">
    <span class="text-right {{ ($d->read == 1) ? 'text-success' : '' }} "><i class="fa fa-check"></i></span>
    <p class="chatMessage bg-primary ml-auto mt--3 text-white">{{ $d->pesan }}</p>
</div>
@else
<p class="text-left">{{ date('H:i', strtotime($d->created_at)) }}</p>
<div class="text-left">
    <p class="chatMessage ml-auto mt--3">{{ $d->pesan }}</p>
</div>
@endif

<!-- <p class="chatMessage mr-auto mt--3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam earum tempore, accusantium deleniti asperiores nesciunt magnam reiciendis aliquam. Facilis odio quisquam molestiae officia. Obcaecati minus adipisci beatae similique corrupti.</p>
<p>22:00</p> -->
@endforeach