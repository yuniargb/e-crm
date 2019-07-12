@foreach($dtl as $d)
<p class="text-right">22:00</p>
<div class="text-right">
    <span class="text-right"><i class="fa fa-check"></i></span>
    <p class="chatMessage bg-primary ml-auto mt--3 text-white">{{ $d->pesan }}</p>
</div>

<!-- <p class="chatMessage mr-auto mt--3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam earum tempore, accusantium deleniti asperiores nesciunt magnam reiciendis aliquam. Facilis odio quisquam molestiae officia. Obcaecati minus adipisci beatae similique corrupti.</p>
<p>22:00</p> -->
@endforeach