<ul>
@foreach($bodegas as $bodega)
    <li>{{$bodega->productID}} {{$bodega->cantidad}}</li>

@endforeach

</ul>