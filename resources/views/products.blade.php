@extends('layout')
@section('title', 'Products')

@section('main-section')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form class="form-inline my-2 my-lg-0 w-100">
                <input class="form-control w-75 " type="Search" placeholder="Search" aria-label="Search">
                <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <div class="container-fluid mt-3 mb-5 pl-5">
        <div class="row">
            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/laptop.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p>
                        <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>     
                        </p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/ssd.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/pendrive.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/pc.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/laptop.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/ssd.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/pendrive.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>

            <div class="card ml-4 mr-2 mt-2 mb-2 p-md-1" style="width: 18rem;">
            <img src="productImage/pc.png" class="card-img-top pImg" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Name</h5>
                    <p class="card-text productDesc">Some quick example text to build on the Product Name and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">See More &raquo;</a>
                </div>
            </div>
        </div>
    </div>
@endsection
