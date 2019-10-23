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
        <div class="col-sm-12 mb-3">
          <button type="button" class="btn-info"  data-toggle="modal" data-target="#exampleModal">
              Export To Excel
          </button>
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
                      @if($item->status === 1 || $item->status === null )
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
                    <a href="https://wa.me/{{$item->phone}}?text=Samlekom%20Dimana%20oi?%20{{$item->name}}" target="_blank" class="btn btn-just-icon btn-success btn-round">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                    <a href="{{route('locations.show',$item->id)}}" class="btn btn-just-icon btn-info btn-round">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Export All Data Locations To Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form action="{{route('locations.store')}}" method="POST" >
              {{csrf_field()}}
              <div class="form-group {{$errors->has('start_date') ? 'has-error' : ' '}}">
                  <label for="start_date">Start Date :</label>
                  <input name="start_date" type="date" class="form-control" id="start_date" aria-describedby="start_date">
                  @if($errors -> has('start_date'))
                  <span class="help-block">{{$errors->first('start_date')}}</span>
                  @endif
              </div>
              <div class="form-group {{$errors->has('start_date') ? 'has-error' : ' '}}">
                <label for="end_date">End Date :</label>
                <input name="end_date" type="date" class="form-control" id="end_date" aria-describedby="end_date">
                @if($errors -> has('end_date'))
                <span class="help-block">{{$errors->first('end_date')}}</span>
                @endif  
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Download</button>
              </div>
          </form>
        </div>
        </div>
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