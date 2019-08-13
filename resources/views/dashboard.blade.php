@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('css')
    <style>
    .stats {
        margin-right: -15px; 
      }
    </style>
@endsection
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <input type="text" id="myFilter" class="form-control" onkeyup="myFunction()" placeholder="Search for names..">
        </div>
      </div>
      <br>
      
      <div class="row" id="myItems">
        @foreach ($users as $item)
          <div class="col-md-3" id="recipe-card">
            <div class="card card-profile ml-auto mr-auto" style="max-width: 300px">
              <div class="card-header card-header-image">
                    <a href="#pablo">
                        <img class="img" src="{{asset('images/'.$item->image)}}" style="width: 100px; border-radius: 100%;">
                    </a>
                </div>

                <div class="card-body ">
                    <h5 class="card-title">{{strtoupper($item->name)}}</span></h5>
                    <h6 class="card-category text-gray">{{$item->rolesDetail->name}}</h6>
                    <div class="card-footer justify-content-center">
                      @if($item->status === 1)
                        <span class="text-success">
                            <i class="fa fa-circle"> Tersedia </i>
                        </span>
                      @elseif($item->status === 2)
                        <span class="text-danger">
                            <i class="fa fa-circle"> Sibuk </i>
                        </span>
                      @else
                        <span>
                            <i class="fa fa-circle"> Cuti </i>
                        </span>
                      @endif
                    </div>
                    
                    <div class="card-footer justify-content-center">
                        <div class="stats text-info">
                            <i class="fa fa-map-marker"> {{strtoupper($item->location)}} </i>
                            
                        </div>
                    </div>
                    
                <hr>
                </div>
                <div class="card-footer justify-content-center">
                    <a href="https://wa.me/6285210069654?text=Oi%20Dimana%20{{$item->name}}" target="_blank" class="btn btn-just-icon btn-success btn-round">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-info btn-round">
                            <i class="fa fa-eye"></i>
                        </a>
                </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
@endsection
@section('js')
  <script>
    function myFunction() {
      var input, filter, cards, cardContainer, h5, title, i;
      input = document.getElementById("myFilter");
      filter = input.value.toUpperCase();
      cardContainer = document.getElementById("myItems");
      cards = cardContainer.getElementsByClassName("card");
      for (i = 0; i < cards.length; i++) {
          title = cards[i].querySelector(".card-body h5.card-title");
          if (title.innerText.toUpperCase().indexOf(filter) > -1) {
              cards[i].style.display = "";
          } else {
              cards[i].style.display = "none";
          }
      }
    }
  </script>
@endsection