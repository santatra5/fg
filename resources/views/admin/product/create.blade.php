@section('style')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
@endsection
@section('scripts')
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
<x-app-layout>
<div class="container">
    <h1 class="text-center mt-4">Ajouter des nouveaux produits</h1>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card p-4 mt-4">
                <form action="{{url('products/store')}}" method='POST' enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group mt-3">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="poduct-name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="product-description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="poduct-description" required></textarea>
                    </div>
                    <div class="form-group mt-3 d-flex justify-content-between">
                        <label for="product-category">Categorie</label>
                        <input type="text" class="form-control w-75" name="category" required>
                    </div>
                    <div class="form-group mt-3 d-flex justify-content-between">
                        <label for="product-category ">Image</label>
                        <input type="file" class="form-control  w-75" name="image">
                    </div>
                    <div class="form-group d-flex mt-3 justify-content-between">
                        <label for="product-price">Prix en Ar</label>
                        <input type="number" class="form-control w-75" name="price" required>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{route('product.index')}}" class="btn btn-success">Retour</a>&nbsp;
                        <input type="submit" value="Ajouter" class="btn btn-warning ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
