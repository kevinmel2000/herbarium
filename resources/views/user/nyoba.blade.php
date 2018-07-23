
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>aaaaa</title>
  </head>
  <body>
    <div class="container">
        <div class="col-md-6">
            @foreach($herbariums as $herb)
            <h3> {{$herb -> name_collector}}
              @endforeach
        </div>
       {{$herbariums->render()}}

    </div>

  </body>
</html>
