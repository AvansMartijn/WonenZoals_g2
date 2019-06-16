@foreach ($residents as $resident)
<div class="modal fade lg" id="resident{{$resident->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                
                <h1 class="modal-Name font-weight-bold">{{$resident->name}}</h5>

                <p class="text-readable">
                  <img class="modal-picture" src="{{$resident->img_url}}">
                  {!!$resident->description!!}
                </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
            </div>
          </div>
        </div>
      </div>
    
@endforeach
    
@foreach ($newsitems as $item)
<div class="modal fade" id="nieuws{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">

              <p class="text-readable">
                  <img class="modal-picture" src="{{ asset('img/News.jpeg') }}" alt="">
                  <h2 class="font-weight-bold text-readable">{{$item->title}}</h2>
                  {!!$item->content!!}
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Sluit</button>
          </div>
        </div>
      </div>
    </div>
    
@endforeach