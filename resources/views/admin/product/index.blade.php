@section('style')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
<x-app-layout>
    <div class="container">
        <div class="d-flex flex-row justify-content-around mt-5">
            <div>
                <h1 class="text-center text-uppercase ">Liste de nos produit</h1>
            </div>
            <div>
                <a class="btn btn-success mt-2" href="{{route('product.create')}}"><i
                        class="fa-solid fa-circle-plus"></i></a>
            </div>
        </div>
        <hr class="hr">

        <div class="btn-group mt-4 text-uppercase">
            <a href="#" class="btn btn-secondary disabled" aria-current="page">Category</a>
            <a href="#" class="btn btn-danger">Tous</a>
            <a href="#" class="btn btn-danger">Boite a bijoux</a>
            <a href="#" class="btn btn-danger">Stylo</a>
        </div>

        <div class="row mt-4">

            <table class="table table-dark table-striped">
                <thead>
                <tr class="">
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix en Ar</th>
                    <th scope="col" class="text-center">Modification</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td><img src="{{asset('uploads/'. $product->image)}}" class="img-thumbnail"
                                 alt="{{$product->name}}" width="80"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{number_format($product->price,0,',','.')}}</td>
                        <td>
                            <div class=" card-footer d-flex flex-column">
                                <a href="{{route('product.edit',$product->id)}}" @if($product->id % 2 !== 0) style="border: solid 1px !important;"@endif
                                   class="btn btn-dark"><i
                                        class="fa-solid fa-pen-to-square "></i></a>
                                <a href="{{route('product.destroy',$product->id)}}"
                                   class="btn btn-danger mt-3"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--                    <div class="col-md-3 mt-4">--}}
            {{--                        <div class="card " style="width: 18rem;">--}}
            {{--                            <img src="{{asset('uploads/'. $product->image)}}" class="card-img-top"--}}
            {{--                                 alt="Image">--}}
            {{--                            <div class="card-body">--}}
            {{--                                <h5 class="card-title text-uppercase">{{$product->name}}</h5>--}}
            {{--                                <p class="card-text">{{$product->description}}</p>--}}
            {{--                                <div class="d-flex justify-content-between">--}}
            {{--                                    <div>--}}
            {{--                                        <h5 class="text-success">{{number_format($product->price,0,',','.')}} Ar</h5>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="d-flex justify-content-end">--}}
            {{--                                        <div class="mt-3">--}}
            {{--                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-dark"><i--}}
            {{--                                                    class="fa-solid fa-pen-to-square "></i></a>--}}
            {{--                                        </div>&nbsp;--}}
            {{--                                        <div>--}}
            {{--                                            <a href="{{route('product.destroy',$product->id)}}"--}}
            {{--                                               class="btn btn-danger mt-3"><i class="fa-solid fa-trash"></i></a>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}


            {{--            <div class="card d-flex flex-row mt-3">--}}
            {{--                <div class="card-header"><img src="{{asset('335183137_140137785375258_1842154047233564047_n.jpg')}}" alt="produit image" class="img-fluid w-20"></div>--}}
            {{--                <div class="card-body">--}}
            {{--                    <h3 class="text-uppercase">{{$product->name}}</h3>--}}
            {{--                    <p>{{$product->description}}</p>--}}
            {{--                </div>--}}
            {{--                <div class="card-footer d-flex flex-column">--}}
            {{--                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-dark"><i class="fa-solid fa-pen-to-square "></i></a>--}}
            {{--                    <a href="{{route('product.destroy',$product->id)}}"--}}
            {{--                       class="btn btn-danger mt-3"><i class="fa-solid fa-trash"></i></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}


        </div>

    </div>


</x-app-layout>

