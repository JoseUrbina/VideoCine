<!-- Modal -->
<div class="modal fade" id="myModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ $title }}</h4>
      </div>
      <div class="modal-body">
          {{ $slot }}
      </div>
      <div class="modal-footer">
        <form action="{{ $route }}" method="POST">
           {{ csrf_field() }}

          <!-- Luego para realizar el DELETE agregar la siguiente linea-->
          {{ method_field('DELETE') }}
          <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
          <button class="btn btn-primary" type="submit">Delete</button>
        </form>        
      </div>
    </div>
  </div>
</div>