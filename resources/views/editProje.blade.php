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

                        <form method="POST" action="{{action('ProjeController@update', $id)}}">
                            {{csrf_field()}}
                                <input type="hidden" name="_method" value="PATCH"/>

                                @if(Auth::user()->authority == 1)
                                    <div _ngcontent-c2="" class="form-group">
                                        <label _ngcontent-c2="" class="birimlerLabel">Öğretim Elemanı:</label>
                                        <select _ngcontent-c2="" name="ogretim_elemani" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%" >
                                            @foreach($users as $item)
                                                @if(Auth::user()->authority == 1)
                                                    <option _ngcontent-c2="" value="{{$item->name}}">{{$item->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <div _ngcontent-c2="" class="form-group">
                                        <label _ngcontent-c2="" class="birimlerLabel">Proje Yürütücüsü</label>
                                        <input _ngcontent-c2="" name="ogretim_elemani" value="{{ Auth::user()->name }}" class="textFull form-control ng-untouched ng-pristine ng-valid" readonly type="text">

                                    </div>
                                @endif


                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Kurum İçi Proje (BAP):</label>
                                    <input _ngcontent-c2="" name="kurum_ici_proje" value="{{ $proje->kurum_ici_proje }}" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                </div>

                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Uluslararası Proje:</label>
                                    <input _ngcontent-c2="" name="uluslararasi_proje" value="{{ $proje->uluslararasi_proje }}" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                </div>
                                <div _ngcontent-c2="" class="form-group" >
                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Proje Durumu:</label>
                                    <select _ngcontent-c2="" name="proje_durumu" value="{{ $proje->proje_durumu }}" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                        <option _ngcontent-c2="" value="0">Devam Ediyor</option>
                                        <option _ngcontent-c2="" value="1">Tamamlandı</option>

                                    </select>
                                </div>
                                <div _ngcontent-c2="" class="form-group" >
                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Proje Türü:</label>
                                    <select _ngcontent-c2="" name="proje_turu" value="{{ $proje->proje_turu }}" class="styledSelect ng-pristine ng-valid ng-touched">
                                        <option _ngcontent-c2="" value="0">SEÇİNİZ</option>
                                        <!----><option _ngcontent-c2="" value="1: 1">(TÜBİTAK) 1001 - Akademik Destek Programı</option><option _ngcontent-c2="" value="2: 2">(TÜBİTAK) 1002 - Akademik Destek Programı</option><option _ngcontent-c2="" value="3: 3">(TÜBİTAK) 1003 - Akademik Destek Programı</option><option _ngcontent-c2="" value="4: 4">(TÜBİTAK) 1005 - Akademik Destek Programı</option><option _ngcontent-c2="" value="5: 5">(TÜBİTAK) 1007 - Kamu Destek Programı</option><option _ngcontent-c2="" value="6: 6">(TÜBİTAK) 1501 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="7: 7">(TÜBİTAK) 1503 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="8: 8">(TÜBİTAK) 1505 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="9: 9">(TÜBİTAK) 1507 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="10: 10">(TÜBİTAK) 1511 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="11: 11">(TÜBİTAK) 1512 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="12: 12">(TÜBİTAK) 1514 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="13: 13">(TÜBİTAK) 1515 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="14: 14">(TÜBİTAK) 1601 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="15: 15">(TÜBİTAK) 1602 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="16: 16">(TÜBİTAK) 2229 - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="17: 17">(TÜBİTAK) 2237 - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="18: 18">(TÜBİTAK) 2238 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="19: 19">(TÜBİTAK) 2239 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="20: 20">(TÜBİTAK) 3001 - Akademik Destek Programı</option><option _ngcontent-c2="" value="21: 21">(TÜBİTAK) 3501 - Akademik Destek Programı</option><option _ngcontent-c2="" value="22: 22">(TÜBİTAK) 4003 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="23: 23">(TÜBİTAK) 4004 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="24: 24">(TÜBİTAK) 4005 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="25: 25">(TÜBİTAK) 4006 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="26: 26">(TÜBİTAK) 4007 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="27: 27">(TÜBİTAK) 5000 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="28: 28">(TÜBİTAK) 5001 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="29: 29">(TÜBİTAK) 5002 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="30: 30">(TÜBİTAK) 2223-B - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="31: 31">(TÜBİTAK) 2223-C - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="32: 32">(TÜBİTAK) 2223-D - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="33: 33">(TÜBİTAK) Akademik COST</option><option _ngcontent-c2="" value="34: 34">(TÜBİTAK) Bilimsel Etkinlik - ICGEP</option><option _ngcontent-c2="" value="35: 35">(TÜBİTAK) Akademik İkili Proje Destekleri</option><option _ngcontent-c2="" value="36: 36">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Tekno Girişim</option><option _ngcontent-c2="" value="37: 37">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Patent Destek</option><option _ngcontent-c2="" value="38: 38">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Yatırım Destek</option><option _ngcontent-c2="" value="39: 39">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Ar-Ge Ürünleri Pazarlama Destek</option><option _ngcontent-c2="" value="40: 40">(UN) UN Destek Projesi</option><option _ngcontent-c2="" value="41: 41">(GSB) Gençlik ve Spor Bakanlığı Destek Projesi</option><option _ngcontent-c2="" value="42: 42">(KA) Kalklınma Ajansı Destek Projesi</option><option _ngcontent-c2="" value="43: 43">(KB) KB-Kalkınma Bakanlığı</option><option _ngcontent-c2="" value="44: 44">(ÖK)OK-Özkaynak</option><option _ngcontent-c2="" value="45: 45">(TİGEM)TİGEM Destek Projesi</option><option _ngcontent-c2="" value="46: 88">Döner Sermaye Projesi (6676 sayılı kanun)</option><option _ngcontent-c2="" value="47: 90">Teknokent Şirketi Projesi</option><option _ngcontent-c2="" value="48: 91">Diğer</option><option _ngcontent-c2="" value="49: 93">Klinik Araştırma Projeleri</option>
                                    </select>
                                </div>
                                <div _ngcontent-c2="" class="form-group" >
                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Alan Bilgisi:</label>
                                    <select _ngcontent-c2="" name="alan_bilgisi" value="{{ $proje->alan_bilgisi }}" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                        <option _ngcontent-c2="" value="NULL">Seçiniz</option>
                                        <option _ngcontent-c2="" value="FEN">FEN</option>
                                        <option _ngcontent-c2="" value="SAĞLIK">SAĞLIK</option>
                                        <option _ngcontent-c2="" value="SOSYAL">SOSYAL</option>


                                    </select>
                                </div>
                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel">Proje Adı:</label>
                                    <input _ngcontent-c2="" name="proje_adi" value="{{ $proje->proje_adi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="40" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="text">
                                </div>

                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel">Proje Bütçesi:</label>
                                    <input _ngcontent-c2="" name="proje_butcesi"  value="{{ $proje->proje_butcesi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                </div>
                                <div _ngcontent-c2="" class="form-group" >
                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Para Birimi:</label>
                                    <select _ngcontent-c2="" name="para_birimi"value="{{ $proje->para_birimi }}"  class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                        <option _ngcontent-c2="" value="NULL">Seçiniz</option>
                                        <option _ngcontent-c2="" value="Dolar">Dolar</option>
                                        <option _ngcontent-c2="" value="Euro">Euro</option>
                                        <option _ngcontent-c2="" value="TL">TL</option>


                                    </select>
                                </div>

                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Kontratlı Proje:</label>
                                    <input _ngcontent-c2="" name="kontratli_proje" value="{{ $proje->kontratli_proje }}" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                </div>
                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Dış Destekli Proje:</label>
                                    <input _ngcontent-c2="" name="dis_destekli_proje" value="{{ $proje->dis_destekli_proje }}" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                </div>
                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Uluslararası İşbirlikli Proje:</label>
                                    <input _ngcontent-c2="" name="uluslararasi_isbirlikli_proje" value="{{ $proje->uluslararasi_isbirlikli_proje }}" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                </div>
                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel">Araştırmacı Sayısı:</label>
                                    <input _ngcontent-c2="" name="arastirmaci_sayisi" value="{{ $proje->arastirmaci_sayisi }}" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                </div>

                                <div _ngcontent-c2="" class="form-group">
                                    <label _ngcontent-c2="" class="birimlerLabel">Proje Yürütücüsü:</label>
                                    <select _ngcontent-c2="" name="proje_yurutucusu" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%" >
                                        @foreach($users as $item)
                                            @if(Auth::user()->authority == 1)
                                                <option _ngcontent-c2="" value="{{$item->name}}">{{$item->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>



                                <input _ngcontent-c2="" class="btn btn-success btn YeniKonuEkle" type="submit" value="Kaydet">

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
