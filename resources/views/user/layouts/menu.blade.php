
<nav class="navbar-inverse navbar-static-top " style="  position: fixed; width:100%">
     <div style="margin-left:30px">   
        <img src="{{ asset("/image/logo-biotrop.png") }}" class="img-picture pull-left  image" width="45px" hight="45px" style="margin-top:10px">
                
        <a class="navbar-brand" href="{{ url('/Herbarium&IAS') }}" style="margin-top:10px; font-family: sans-serif">
               <b>  HERBARIUM </b>
        </a>
    </div>
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse" style="margin-top:10px">
            <ul class="nav nav-pills navbar-right">
                <li class="item">
                    <a class="navbar-link" href="{{url('/Herbarium&IAS')}}"> Home </a>
                </li>
                <li class="item dropdown">
                    <a class="navbar-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Herbarium <span class="caret"></span></a>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a class ="dropdown-header" href="{{url ('Herbarium&IAS/herbarium/weed')}}">Weed Herbarium</a>
                        <a class="dropdown-header" href="{{url ('Herbarium&IAS/herbarium/forest')}}">Forest Herbarium</a>
                        <a class="dropdown-header" href="{{url ('Herbarium&IAS/herbarium/liken')}}">Liken Herbarium</a>
                        <a class="dropdown-header" href="{{url ('Herbarium&IAS/herbarium/briovitas')}}">Briovitas Herbarium</a>
                    </div>
                </li>
                <li class="item">
                    <a class="navbar-link" href="{{url('Herbarium&IAS/invasive')}}"> Invasive Alien Species </a>
                </li>
                <li class="item">
                    <a class="navbar-link" href="{{url('Herbarium&IAS/about')}}">About Us </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
