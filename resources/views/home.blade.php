@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success123'))
                        <div class="alert alert-success" >
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab"  id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" class="btn btn-info btn float-left" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  aria-controls="collapseOne">
                                            Personel Bilgileri
                                        </a>
                                    </h4>
                                </div>


                                <div class="panel-heading" role="tab"  id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="btn btn-info btn float-left collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"  aria-controls="collapseTwo">
                                            Makale/Derleme Bilgileri
                                        </a>
                                    </h4>
                                </div>


                                <div class="panel-heading" role="tab"  id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="btn btn-info btn float-left collapsed"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"  aria-controls="collapseThree">
                                            Proje Bilgileri
                                        </a>
                                    </h4>
                                </div>


                                <div class="panel-heading" role="tab"  id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="btn btn-info btn float-left collapsed"  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"  aria-controls="collapseThree">
                                            Birim Bilgileri

                                        </a>
                                    </h4>
                                </div>


                                <div id="parent-collapse" class="panel panel-default">


                                    <div id="collapseOne" class="panel-collapse collapse in" data-parent="#accordion" role="tabpanel" aria-labelledby="headingOne">
                                        <br><br> <div class="panel-body">
                                            <div _ngcontent-c2="">
                                                <form method="POST" action="{{route('firsts.store')}}">
                                                    @csrf
                                                    <br><br>
                                                    <div _ngcontent-c2="" class="form-group">
                                                        <label _ngcontent-c2="" class="birimlerLabel">Öğretim Elemanı:</label>
                                                        <input _ngcontent-c2="" name="ogretim_elemani" value="{{ Auth::user()->name }}" class="textFull form-control ng-untouched ng-pristine ng-valid" readonly type="text">

                                                    </div>

                                                    <!----><div _ngcontent-c2="">
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">WOS H Index:</label>
                                                            <input _ngcontent-c2="" name="wos_h_index" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">WOS Atıf Sayısı:</label>
                                                            <input _ngcontent-c2="" name="wos_atif_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Scopus H Index:</label>
                                                            <input _ngcontent-c2="" name="scopus_h_index" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Scopus Atıf Sayısı:</label>
                                                            <input _ngcontent-c2="" name="scopus_atif_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <!----><div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Uzmanlık Alanı 1:</label>
                                                            <input _ngcontent-c2="" name="uzmanlik_alani" class="textFull form-control ng-untouched ng-pristine ng-valid" placeholder="Uzmanlık alanı giriniz..." type="text">
                                                        </div>

                                                        <input _ngcontent-c2="" class="btn btn-success btnYeniKonuEkle" type="submit" value="Kaydet">
                                                    </div>
                                                </form>
                                                @if( Auth::user()->authority)
                                                    <center><table class="table table-striped" style="width:100%" >
                                                        <tr>

                                                                <th>Id</th>
                                                                <th>Öğretim Elemanı</th>


                                                            <th>WOS H Index</th>
                                                            <th>WOS Atıf Sayısı</th>

                                                            <th>Scopus H Index</th>
                                                            <th>Scopus Atıf Sayısı</th>
                                                            <th>Uzmanlık Alanı</th>



                                                            <th>Delete</th>
                                                        </tr>

                                                        @foreach($game as $games)
                                                            @if(Auth::user()->authority == 1)
                                                                <tr>

                                                                    <th>{{$games->id}}</th>
                                                                    <td>{{$games->ogretim_elemani}}</td>

                                                                    <td>{{$games->wos_h_index}}</td>
                                                                    <td>{{$games->wos_atif_sayisi}}</td>
                                                                    <td>{{$games->scopus_h_index}}</td>
                                                                    <td>{{$games->scopus_atif_sayisi}}</td>
                                                                    <td>{{$games->uzmanlik_alani}}</td>



                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('FirstController@destroy', $games->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>
                                                                </tr>



                                                            @elseif ($games->yazarlar == Auth::user()->name && Auth::user()->authority == 0)

                                                                <tr>
                                                                    <td>{{$games->isim}}</td>
                                                                    <td>{{$games->endeks_turu}}</td>

                                                                    <td>{{$games->yazarlar}}</td>

                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('FirstController@destroy', $games->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>
                                                                </tr>

                                                            @endif
                                                        @endforeach

                                                    </table></center>
                                                @endif
                                                <div _ngcontent-c2="" class="form-group">
                                                    <p _ngcontent-c2="">
                                                        <ngb-alert _ngcontent-c2="">
                                                            <div role="alert" class="alert alert-warning">
                                                                <!---->
                                                                <strong _ngcontent-c2="">Uyarı!</strong> WOS ve SCOPUS sayıları aktif yıla ait değil, bugüne kadarki toplam değerleri içerecektir.
                                                            </div>
                                                        </ngb-alert>
                                                    </p>
                                                </div>

                                            </div>                                    </div>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingTwo">
                                        <br><br>   <div class="panel-body">
                                            <div _ngcontent-c2="">

                                                <form method="POST" action="{{route('makales.store')}}">
                                                    @csrf
                                                    <br><br>
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
                                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:30%"> Proje Yürütücüsü</label>
                                                    <input _ngcontent-c2="" name="proje_yurutucusu" type="checkbox" class="ng-valid ng-dirty ng-touched" >
                                                </div>

                                                <div _ngcontent-c2="" class="form-group" >
                                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Yayın Türü</label>
                                                    <select _ngcontent-c2="" name="yayin_turu" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                                        <option _ngcontent-c2="" value="Ulusal Makale">Ulusal Makale</option>
                                                        <option _ngcontent-c2="" value="Ulusal Bildiri">Ulusal Bildiri</option>
                                                        <option _ngcontent-c2="" value="Uluslararası Makale">Uluslararası Makale</option>
                                                        <option _ngcontent-c2="" value="Uluslararası Bildiri">Uluslararası Bildiri</option>
                                                        <option _ngcontent-c2="" value="Patent">Patent</option>


                                                    </select>

                                                </div>

                                                <div _ngcontent-c2="" class="form-group" >
                                                    <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Endeks Türü:</label>
                                                    <select _ngcontent-c2="" name="endeks_turu" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
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
                                                    <label _ngcontent-c2="" class="birimlerLabel" style="width:25%">Makale/Bildiri Adı:</label>
                                                    <input _ngcontent-c2="" name="isim"  class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="100" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">

                                                </div>
                                                    @foreach($users as $item)
                                                        <option _ngcontent-c2=""  value="{{$item->name}}" >{{$item->name}}</option>
                                                    @endforeach
                                                <div _ngcontent-c2="" class="form-group">
                                                    <label for="yazarlar" class="birimlerLabel" style="width:25%">Yazar Listesi:(Birden Fazla Seçebilirsiniz)</label>



                                                    <select class="form-control"  multiple="multiple" name="yazarlar" id="yazarlar_id" style="width:70%">


                                                        @foreach($users as $item)
                                                            <option value="{{$item->name}}" >{{$item->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Dergi Adı:</label>
                                                    <input _ngcontent-c2="" name="dergi_adi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                                                </div>
                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Konferans:</label>
                                                    <input _ngcontent-c2="" name="konferans_adi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                                                </div>
                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Cilt:</label>
                                                    <input _ngcontent-c2="" name="cilt" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                </div>

                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Numara:</label>
                                                    <input _ngcontent-c2="" name="numara" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                </div>

                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Sayfa:</label>
                                                    <input _ngcontent-c2="" name="sayfa" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                </div>
                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">Yıl:</label>
                                                    <input _ngcontent-c2="" name="yil" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                </div>


                                                <div _ngcontent-c2="" class="form-group">
                                                    <label _ngcontent-c2="" class="birimlerLabel">DOİ:</label>
                                                    <input _ngcontent-c2="" name="doi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="30" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="string">
                                                </div>









                                                <input _ngcontent-c2="" class="btn btn-success btn YeniKonuEkle" type="submit" value="Kaydet">

                                                </form>
                                                <br><br>


                                                <center><table class="table table-striped" style="width:100%" >
                                                        <tr>
                                                            @if( Auth::user()->authority)
                                                                <th>Id</th>
                                                                <th>Öğretim Elemanı</th>
                                                            @endif

                                                            <th>Makale Adı</th>
                                                            <th>Yazar Listesi</th>

                                                            <th>Endeks Türü</th>

                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>

                                                        @foreach($makales as $item)
                                                            @if(Auth::user()->authority == 1)
                                                            <tr>
                                                                @if( Auth::user()->authority)
                                                                    <th>{{$item->id}}</th>
                                                                    <td>{{$item->ogretim_elemani}}</td>
                                                                @endif
                                                                <td>{{$item->isim}}</td>
                                                                <td>{{$item->yazarlar}}</td>
                                                                <td>{{$item->endeks_turu}}</td>


                                                                <td><a href="{{action('MakaleController@edit', $item->id)}}" class="btn btn-warning" >Edit</a> </td>
                                                                <td>
                                                                    <form method="post" class="delete_form" action="{{action('MakaleController@destroy', $item->id)}}">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="_method" value="DELETE"/>
                                                                        <button type="submit" class="btn btn-danger">Delete</button>


                                                                    </form>

                                                                </td>
                                                            </tr>



                                                            @elseif ($item->yazarlar == Auth::user()->name && Auth::user()->authority == 0)

                                                                <tr>
                                                                    <td>{{$item->isim}}</td>
                                                                    <td>{{$item->endeks_turu}}</td>

                                                                    <td>{{$item->yazarlar}}</td>
                                                                    <td><a href="{{action('MakaleController@edit', $item->id)}}" class="btn btn-warning" >Edit</a> </td>
                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('MakaleController@destroy', $item->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>
                                                                </tr>

                                                            @endif
                                                        @endforeach

                                                    </table></center>




                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingThree">
                                        <br><br>   <div class="panel-body">
                                            <div _ngcontent-c2="">
                                                <form method="POST" action="{{route('projes.store')}}">
                                                    @csrf
                                                    <br><br>

                                                    <div _ngcontent-c2="" class="form-group">
                                                        <label _ngcontent-c2="" class="birimlerLabel">Proje Yürütücüsü</label>
                                                        <input _ngcontent-c2="" name="ogretim_elemani" value="{{ Auth::user()->name }}" class="textFull form-control ng-untouched ng-pristine ng-valid" readonly type="text">

                                                    </div>
                                                    <div _ngcontent-c2="" class="form-group">
                                                        <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Kurum İçi Proje (BAP):</label>
                                                        <input _ngcontent-c2="" name="kurum_ici_proje" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                                    </div>

                                                    <div _ngcontent-c2="" class="form-group">
                                                        <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Uluslararası Proje:</label>
                                                        <input _ngcontent-c2="" name="uluslararasi_proje" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                                    </div>
                                                    <!----><div _ngcontent-c2="">
                                                        <div _ngcontent-c2="" class="form-group" >
                                                            <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Proje Durumu:</label>
                                                            <select _ngcontent-c2="" name="proje_durumu" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                                                <option _ngcontent-c2="" value="0">Devam Ediyor</option>
                                                                <option _ngcontent-c2="" value="1">Tamamlandı</option>

                                                            </select>
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group" >
                                                            <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Proje Türü:</label>
                                                            <select _ngcontent-c2="" name="proje_turu" class="styledSelect ng-pristine ng-valid ng-touched">
                                                                <option _ngcontent-c2="" value="0">SEÇİNİZ</option>
                                                                <!----><option _ngcontent-c2="" value="1: 1">(TÜBİTAK) 1001 - Akademik Destek Programı</option><option _ngcontent-c2="" value="2: 2">(TÜBİTAK) 1002 - Akademik Destek Programı</option><option _ngcontent-c2="" value="3: 3">(TÜBİTAK) 1003 - Akademik Destek Programı</option><option _ngcontent-c2="" value="4: 4">(TÜBİTAK) 1005 - Akademik Destek Programı</option><option _ngcontent-c2="" value="5: 5">(TÜBİTAK) 1007 - Kamu Destek Programı</option><option _ngcontent-c2="" value="6: 6">(TÜBİTAK) 1501 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="7: 7">(TÜBİTAK) 1503 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="8: 8">(TÜBİTAK) 1505 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="9: 9">(TÜBİTAK) 1507 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="10: 10">(TÜBİTAK) 1511 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="11: 11">(TÜBİTAK) 1512 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="12: 12">(TÜBİTAK) 1514 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="13: 13">(TÜBİTAK) 1515 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="14: 14">(TÜBİTAK) 1601 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="15: 15">(TÜBİTAK) 1602 - Sanayi Destek Programı</option><option _ngcontent-c2="" value="16: 16">(TÜBİTAK) 2229 - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="17: 17">(TÜBİTAK) 2237 - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="18: 18">(TÜBİTAK) 2238 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="19: 19">(TÜBİTAK) 2239 - Girişimcilik Destek Programı</option><option _ngcontent-c2="" value="20: 20">(TÜBİTAK) 3001 - Akademik Destek Programı</option><option _ngcontent-c2="" value="21: 21">(TÜBİTAK) 3501 - Akademik Destek Programı</option><option _ngcontent-c2="" value="22: 22">(TÜBİTAK) 4003 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="23: 23">(TÜBİTAK) 4004 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="24: 24">(TÜBİTAK) 4005 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="25: 25">(TÜBİTAK) 4006 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="26: 26">(TÜBİTAK) 4007 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="27: 27">(TÜBİTAK) 5000 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="28: 28">(TÜBİTAK) 5001 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="29: 29">(TÜBİTAK) 5002 - Bilim ve Toplum Destek Programı</option><option _ngcontent-c2="" value="30: 30">(TÜBİTAK) 2223-B - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="31: 31">(TÜBİTAK) 2223-C - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="32: 32">(TÜBİTAK) 2223-D - Bilimsel Etkinlik Destek Programı</option><option _ngcontent-c2="" value="33: 33">(TÜBİTAK) Akademik COST</option><option _ngcontent-c2="" value="34: 34">(TÜBİTAK) Bilimsel Etkinlik - ICGEP</option><option _ngcontent-c2="" value="35: 35">(TÜBİTAK) Akademik İkili Proje Destekleri</option><option _ngcontent-c2="" value="36: 36">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Tekno Girişim</option><option _ngcontent-c2="" value="37: 37">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Patent Destek</option><option _ngcontent-c2="" value="38: 38">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Yatırım Destek</option><option _ngcontent-c2="" value="39: 39">(BSTB) Bilim Sanayi ve Teknoloji Bakanlığı Ar-Ge Ürünleri Pazarlama Destek</option><option _ngcontent-c2="" value="40: 40">(UN) UN Destek Projesi</option><option _ngcontent-c2="" value="41: 41">(GSB) Gençlik ve Spor Bakanlığı Destek Projesi</option><option _ngcontent-c2="" value="42: 42">(KA) Kalklınma Ajansı Destek Projesi</option><option _ngcontent-c2="" value="43: 43">(KB) KB-Kalkınma Bakanlığı</option><option _ngcontent-c2="" value="44: 44">(ÖK)OK-Özkaynak</option><option _ngcontent-c2="" value="45: 45">(TİGEM)TİGEM Destek Projesi</option><option _ngcontent-c2="" value="46: 88">Döner Sermaye Projesi (6676 sayılı kanun)</option><option _ngcontent-c2="" value="47: 90">Teknokent Şirketi Projesi</option><option _ngcontent-c2="" value="48: 91">Diğer</option><option _ngcontent-c2="" value="49: 93">Klinik Araştırma Projeleri</option>
                                                            </select>
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group" >
                                                            <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Alan Bilgisi:</label>
                                                            <select _ngcontent-c2="" name="alan_bilgisi" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                                                <option _ngcontent-c2="" value="NULL">Seçiniz</option>
                                                                <option _ngcontent-c2="" value="FEN">FEN</option>
                                                                <option _ngcontent-c2="" value="SAĞLIK">SAĞLIK</option>
                                                                <option _ngcontent-c2="" value="SOSYAL">SOSYAL</option>


                                                            </select>
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Proje Adı:</label>
                                                            <input _ngcontent-c2="" name="proje_adi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="40" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="text">
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Proje Bütçesi:</label>
                                                            <input _ngcontent-c2="" name="proje_butcesi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group" >
                                                            <label _ngcontent-c2="" class="birimlerLabel"  style="width:20%">Para Birimi:</label>
                                                            <select _ngcontent-c2="" name="para_birimi" class="styledSelect ng-pristine ng-valid ng-touched" style="width:79%">
                                                                <option _ngcontent-c2="" value="NULL">Seçiniz</option>
                                                                <option _ngcontent-c2="" value="Dolar">Dolar</option>
                                                                <option _ngcontent-c2="" value="Euro">Euro</option>
                                                                <option _ngcontent-c2="" value="TL">TL</option>


                                                            </select>
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Kontratlı Proje:</label>
                                                            <input _ngcontent-c2="" name="kontratli_proje" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Dış Destekli Proje:</label>
                                                            <input _ngcontent-c2="" name="dis_destekli_proje" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel" style="width:30%">Uluslararası İşbirlikli Proje:</label>
                                                            <input _ngcontent-c2="" name="uluslararasi_isbirlikli_proje" type="checkbox" class="ng-valid ng-dirty ng-touched">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Araştırmacı Sayısı:</label>
                                                            <input _ngcontent-c2="" name="arastirmaci_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Proje Yürütücüsü</label>
                                                            <input _ngcontent-c2="" name="proje_yurutucusu" value="{{ Auth::user()->name }}" class="textFull form-control ng-untouched ng-pristine ng-valid" placeholder="Uzmanlık alanı giriniz..." type="text">

                                                        </div>


                                                        <input _ngcontent-c2="" class="btn btn-success btnYeniKonuEkle" type="submit" value="Kaydet">
                                                    </div>
                                                </form>

                                                <center><table class="table table-striped" style="width:100%" >
                                                        <tr>
                                                            @if( Auth::user()->authority)
                                                                <th>Id</th>
                                                                <th>Öğretim Elemanı</th>
                                                            @endif

                                                            <th>Proje Adı</th>
                                                            <th>Proje Türü</th>

                                                            <th>Proje Yürütücüsü</th>

                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>

                                                        @foreach($projes as $item)
                                                            @if(Auth::user()->authority == 1)
                                                                <tr>
                                                                    @if( Auth::user()->authority)
                                                                        <th>{{$item->id}}</th>
                                                                        <td>{{$item->ogretim_elemani}}</td>
                                                                    @endif
                                                                    <td>{{$item->proje_adi}}</td>
                                                                    <td>{{$item->proje_turu}}</td>
                                                                    <td>{{$item->proje_yurutucusu}}</td>


                                                                    <td><a href="{{action('ProjeController@edit', $item->id)}}" class="btn btn-warning" >Edit</a> </td>
                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('ProjeController@destroy', $item->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>
                                                                </tr>



                                                            @elseif ($item->ogretim_elemani == Auth::user()->name && Auth::user()->authority == 0)

                                                                <tr>
                                                                    <td>{{$item->proje_adi}}</td>
                                                                    <td>{{$item->proje_adi}}</td>

                                                                    <td>{{$item->proje_yurutucusu}}</td>
                                                                    <td><a href="{{action('ProjeController@edit', $item->id)}}" class="btn btn-warning" >Edit</a> </td>
                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('ProjeController@destroy', $item->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>
                                                                </tr>

                                                            @endif
                                                        @endforeach

                                                    </table></center>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse in" data-parent="#accordion" role="tabpanel" aria-labelledby="headingFour">
                                        <br><br> <div class="panel-body">
                                            <div _ngcontent-c2="">
                                                <form method="POST" action="{{route('birims.store')}}">
                                                    @csrf
                                                    <br><br>

                                                    <div _ngcontent-c2="" class="form-group">
                                                        <label _ngcontent-c2="" class="birimlerLabel">Öğretim Elemanı:</label>
                                                        <input _ngcontent-c2="" name="ogretim_elemani" value="{{ Auth::user()->name }}" class="textFull form-control ng-untouched ng-pristine ng-valid" readonly type="text">

                                                    </div>

                                                    <!----><div _ngcontent-c2="">
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Tezli yüksek lisans öğrenci sayısı:</label>
                                                            <input _ngcontent-c2="" name="tezli_yuksek_lisans" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Doktora öğrenci sayısı:</label>
                                                            <input _ngcontent-c2="" name="doktora_ogrenci" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Doktora mezun sayısı:</label>
                                                            <input _ngcontent-c2="" name="doktor_mezun" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Faal olan öğretim üyesi teknoloji şirketi sayısı:</label>
                                                            <input _ngcontent-c2="" name="faal_olan_ogretim_uysei_teknoloji_sirket_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <!----><div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">YÖK 100/2000 doktora burs programı alan sayısı:</label>
                                                            <input _ngcontent-c2="" name="doktora_burs_programi_alan_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>


                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">YÖK 100/2000 Doktora burs programı öğrenci sayısı:</label>
                                                            <input _ngcontent-c2="" name="doktora_burs_programi_ogrenci_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>



                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Ulusal patent belge sayısı:</label>
                                                            <input _ngcontent-c2="" name="ulusal_patent_belge_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Uluslararası patent belge sayısı:</label>
                                                            <input _ngcontent-c2="" name="uluslararasi_patent_belge_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">Faydalı model ve endüstriyel tasarım sayısı:</label>
                                                            <input _ngcontent-c2="" name="faydali_model_ve_endustriyel_tasarim_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>
                                                        <div _ngcontent-c2="" class="form-group">
                                                            <label _ngcontent-c2="" class="birimlerLabel">TÜBA ve TÜBİTAK ödüllü öğretim üyesi sayısı</label>
                                                            <input _ngcontent-c2="" name="odullu_ogrenci_sayisi" class="textFull form-control ng-untouched ng-pristine ng-valid"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number">
                                                        </div>

                                                        <input _ngcontent-c2="" class="btn btn-success btnYeniKonuEkle" type="submit" value="Kaydet">
                                                    </div>
                                                </form>
                                                @if( Auth::user()->authority)
                                                    <center><table class="table table-striped" style="width:100%" >
                                                            <tr>

                                                                <th>Öğretim Elemanı</th>
                                                                <th>Tezli yüksek lisans öğrenci sayısı</th>


                                                                <th>Doktora öğrenci sayısı</th>
                                                                <th>Doktora mezun sayısı</th>

                                                                <th>Faal olan öğretim üyesi teknoloji şirketi sayısı</th>
                                                                <th>YÖK 100/2000 doktora burs programı alan sayısı</th>
                                                                <th>YÖK 100/2000 Doktora burs programı öğrenci sayısı</th>
                                                                <th>Ulusal patent belge sayısı</th>


                                                                <th>Faydalı model ve endüstriyel tasarım sayısı</th>
                                                                <th>TÜBA ve TÜBİTAK ödüllü öğretim üyesi sayısı</th>


                                                                <th>Delete</th>
                                                            </tr>

                                                            @foreach($birims as $item)

                                                                <tr>


                                                                    <td>{{$item->ogretim_elemani}}</td>
                                                                    <th>{{$item->tezli_yuksek_lisans}}</th>
                                                                    <th>{{$item->doktora_ogrenci}}</th>
                                                                    <th>{{$item->doktor_mezun}}</th>
                                                                    <th>{{$item->faal_olan_ogretim_uysei_teknoloji_sirket_sayisi}}</th>
                                                                    <th>{{$item->doktora_burs_programi_alan_sayisi}}</th>
                                                                    <th>{{$item->doktora_burs_programi_ogrenci_sayisi}}</th>
                                                                    <th>{{$item->ulusal_patent_belge_sayisi}}</th>
                                                                    <th>{{$item->faydali_model_ve_endustriyel_tasarim_sayisi}}</th>
                                                                    <th>{{$item->odullu_ogrenci_sayisi}}</th>
                                                                    <td>
                                                                        <form method="post" class="delete_form" action="{{action('BirimController@destroy', $item->id)}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" name="_method" value="DELETE"/>
                                                                            <button type="submit" class="btn btn-danger">Delete</button>


                                                                        </form>

                                                                    </td>




                                                                </tr>

                                                            @endforeach
                                                        @endif
                                                    </table></center>

                                            </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">


                                </div>
                                <div class="panel panel-default">



                                </div>
                            </div>
                            <br>

                        </div>
                </div>
            </div>
        </div>
    </div>
    <br></div>

@endsection
