
<div class="box box-default">
  <div class="box-header with-border">
  </div>

  @php
    $index = 0;
  @endphp
      @foreach($items as $item)
        <div class="col-md-3">
          <div class="form-group">
            @php
              $stringFormat = strtolower(
                str_replace(' ', ' ',  $item));
            @endphp
            <input value="{{isset($oldVals) ? $oldVals[$index] : ''}}" type="text" class="form-control" name="<?=$stringFormat?>" id="input<?=$stringFormat?>" id="input<?=$stringFormat?>" placeholder="{{$item}}">
          </div>
        </div>
          @php
             $index++;
          @endphp
      @endforeach
      <!-- /.box-body -->
</div>
