@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ Auth::user()->name }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{action('MakaleController@update', $id)}}">
                                {{csrf_field()}}
                            <input type="hidden" name="_method" value="PATCH"/>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Öğretim Elemanı:</label>
                                <input _ngcontent-c2="" name="ogretim_elemani" value="{{ $makale->ogretim_elemani }}" class="textFull form-control ng-untouched ng-pristine ng-valid"   readonly type="text">

                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel" style="width:30%"> Proje Yürütücüsü</label>
                                <input _ngcontent-c2="" name="proje_yurutucusu" value="{{ $makale->proje_yurutucusu }}" type="checkbox" class="ng-valid ng-dirty ng-touched" >
                            </div>

                            <div _ngcontent-c2="" class="form-group" >
                                <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Yayın Türü</label>
                                <select _ngcontent-c2="" name="yayin_turu" value="{{ $makale->yayin_turu }}" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                    <option _ngcontent-c2="" value="Ulusal Makale">Ulusal Makale</option>
                                    <option _ngcontent-c2="" value="Ulusal Bildiri">Ulusal Bildiri</option>
                                    <option _ngcontent-c2="" value="Uluslararası Makale">Uluslararası Makale</option>
                                    <option _ngcontent-c2="" value="Uluslararası Bildiri">Uluslararası Bildiri</option>
                                    <option _ngcontent-c2="" value="Patent">Patent</option>

                                </select>

                            </div>

                            <div _ngcontent-c2="" class="form-group" >
                                <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Endeks Türü:</label>
                                <select _ngcontent-c2="" name="endeks_turu" value="{{ $makale->endeks_turu }}" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                    <option _ngcontent-c2="" value="Seciniz">Seçiniz</option>
                                    <option _ngcontent-c2="" value="SCI">SCI</option>
                                    <option _ngcontent-c2="" value="SCI-E">SCI-E</option>
                                    <option _ngcontent-c2="" value="SSCI">SSCI</option>
                                    <option _ngcontent-c2="" value="AHCI">A&amp;HCI</option>
                                    <option _ngcontent-c2="" value="SCOPUS">SCOPUS</option>
                                    <option _ngcontent-c2="" value="Diğer">Diğer</option>
                                </select>

                            </div>
                            <h2>Yayın Detayı</h2>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Makale/Bildiri Adı:</label>
                                <input _ngcontent-c2="" name="isim" value="{{ $makale->isim }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="100" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="text">
                            </div>

                            <div _ngcontent-c2="" class="form-group">
                                <label for="yazarlar" class="birimlerLabel" style="width:25%">Yazar Listesi:(Birden Fazla Seçebilirsiniz)</label>



                                <select multiple class="form-control"   name="yazarlar[]"  style="width:70%">


                                    @foreach($users as $item)
                                        <option value="{{$item->name}}" >{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Dergi Adı:</label>
                                <input _ngcontent-c2="" name="dergi_adi" value="{{ $makale->dergi_adi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Konferans:</label>
                                <input _ngcontent-c2="" name="konferans_adi" value="{{ $makale->konferans_adi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Cilt:</label>
                                <input _ngcontent-c2="" name="cilt" value="{{ $makale->cilt }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                            </div>

                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Numara:</label>
                                <input _ngcontent-c2="" name="numara" value="{{ $makale->numara }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                            </div>

                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Sayfa:</label>
                                <input _ngcontent-c2="" name="sayfa" value="{{ $makale->sayfa }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                            </div>
                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">Yıl:</label>
                                <input _ngcontent-c2="" name="yil" value="{{ $makale->yil }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                            </div>


                            <div _ngcontent-c2="" class="form-group">
                                <label _ngcontent-c2="" class="birimlerLabel">DOİ:</label>
                                <input _ngcontent-c2="" name="doi" value="{{ $makale->doi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="30" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                            </div>









                            <input _ngcontent-c2="" class="btn btn-success btn YeniKonuEkle" type="submit" value="Kaydet">

                            </form>


                        </div>
                    </div>
            </div>
        </div>
    </div>







@endsection
