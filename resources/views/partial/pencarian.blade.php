<div class="row justify-content-center">
 <div class="col-8">
  <div class="card-deck">
    <!-- 4 of these -->
    <div class="card">
      <img class="card-img-top img-adjusted" >
      <form action="/pencarian/pencarian" method="GET">
          <div class="card-body">
           <div class="row">
               <div class="col-md-12 has-success mb-3 ">
                   <label for="fname">{{App\Helpers\Smt::translate('Nama Dokumen',app()->getLocale())}} </label> 
                   <input value="{{request()->get('dokumen') ?? ''}}" class="form-control " type="text" name="dokumen" id="dokumen" placeholder="{{App\Helpers\Smt::translate('Masukkan Nama Dokumen',app()->getLocale())}}"  >
               </div>
               
               
           </div>
           <div class="row">
               {{-- <div class="col-md-6 mb-3">
                   <label for="fname">Tipe Dokumen </label> 
                   <select data-kt-select2="true" class="form-control" name="tipe_dokumen" id="tipe_dokumen">
                       <option value="">-Tipe Dokumen-</option>
                       <option {{App\Helpers\Smt::isSelected(request()->get('tipe_dokumen'),'1')}} value="1">Peraturan Perundang-undangan</option>
                       <option {{App\Helpers\Smt::isSelected(request()->get('tipe_dokumen'),'2')}} value="2">Monografi Hukum</option>
                       <option {{App\Helpers\Smt::isSelected(request()->get('tipe_dokumen'),'3')}} value="3">Artikel Hukum</option>
                   </select>
               </div> --}}
               <div class="col-md-12 mb-3">
                   <label for="fname">{{App\Helpers\Smt::translate('Jenis Dokumen',app()->getLocale())}} </label> 
                   <select data-kt-select2="true" class="form-control" name="kategori" id="kategori">
                       <option value="">-{{App\Helpers\Smt::translate('Jenis Dokumen',app()->getLocale())}}-</option>
                       @foreach($kategori as $k)
                           <option {{App\Helpers\Smt::isSelected(request()->get('kategori'),$k->link)}} value="{{ $k->link }}">{{App\Helpers\Smt::translate($k->nama,app()->getLocale())}}</option>
                       @endforeach
                   </select>
               </div>
           </div>
           <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="fname">{{App\Helpers\Smt::translate('Nomor',app()->getLocale())}} </label> 
                    <input value="{{request()->get('nomor') ?? ''}}" type="text" name="nomor" id="nomor" class="form-control" placeholder="{{App\Helpers\Smt::translate('Nomor Dokumen',app()->getLocale())}}">
                </div>
               <div class="col-md-4 mb-3">
                   <label for="fname">{{App\Helpers\Smt::translate('Tahun',app()->getLocale())}} </label> 
                   <select data-kt-select2="true" class="form-control" name="tahun" id="tahun">
                       <option value="">-{{App\Helpers\Smt::translate('Pilih Tahun',app()->getLocale())}}</option>
                       @foreach ( range( date('Y'),1950 ) as $i )
                           <option {{App\Helpers\Smt::isSelected(request()->get('tahun'),$i)}} value="{{ $i }}">{{ $i }}</option>
                       @endforeach
                   </select>
               </div>
               <div class="col-md-4 mb-3">
                   <label for="fname">{{App\Helpers\Smt::translate('Status',app()->getLocale())}} </label> 
                   <select data-kt-select2="true" class="form-control" name="status_dokumen" id="status_dokumen">
                       <option value="">-{{App\Helpers\Smt::translate('Pilih Status',app()->getLocale())}}-</option>
                       <option {{App\Helpers\Smt::isSelected(request()->get('status_dokumen'),'1')}} value="1">{{App\Helpers\Smt::translate('Berlaku',app()->getLocale())}}</option>
                       <option {{App\Helpers\Smt::isSelected(request()->get('status_dokumen'),'0')}} value="0">{{App\Helpers\Smt::translate('Tidak Berlaku',app()->getLocale())}}</option>
                   </select>
               </div>
           </div>
           <center>
            {{-- kt_advanced_search_button_1 --}}
               <button class="btn primary-btn-outline " type="submit">
                   <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                       <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                   </svg>
                   {{App\Helpers\Smt::translate('CARI',app()->getLocale())}}
               </button>
           </center>
          </div>
      </form>
    </div>
  </div>
 </div>
</div>
<br>
