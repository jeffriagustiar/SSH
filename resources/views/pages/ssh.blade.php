



  <table class="table table-bordered table-striped " id="crudTable3" width="100%">
      <thead>
        <tr>
          <th>kode</th>
          <th>uraian</th>
          <th>spek</th>
          <th>satuan</th>
          <th>harga</th>
          <th>rekening_1</th>
          <th>rekening_2</th>
          <th>rekening_3</th>
          <th>rekening_4</th>
          <th>rekening_5</th>
          <th>rekening_6</th>
          <th>rekening_7</th>
          <th>rekening_8</th>
          <th>rekening_9</th>
          <th>rekening_10</th>
          <th>kelompok</th>
        </tr>
        @forelse ($com as $c)
          <tr>
            <td>{{ $c->sandard->kode_standar }}</td>
            <td>{{ $c->ssh->uraian }}</td>
            <td>{{ $c->ssh->spek }}</td>
            <td>{{ $c->ssh->satuan }}</td>
            <td>{{ $c->ssh->harga }}</td>
            <td>{{ $c->ssh->acc1->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc2->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc3->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc4->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc5->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc6->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc7->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc8->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc9->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->acc10->kode_rekening ?? ''}}</td>
            <td>{{ $c->ssh->kelompok }}</td>
          </tr>
        @empty
            Kosong
        @endforelse
          
      </thead>
    </table>


