
<div class="container">
    <div class="row justify-content-center">
        @foreach ($products as $key => $product)
            <div class="product-card m-2">
                <div class="badge">Hot</div>
                <div class="product-tumb">
                    <img src="{{$product->image}}" alt="">
                    {{-- /public/images/{{$product->image_path}} --}}
                </div>
                <div class="product-details">
                    <h4><a href="">{{$product->title}}</a></h4>
                    <h3>{{ $product->price }}$</h3>
                    <div class="product-bottom-details">
                        <p>{{$product->genre}}</p>
                        <p>{{$product->platform}}</p>
                        <div class="product-price"></div>
                        {{-- <div class="product-links">
                            <a href=""><i class="fa fa-heart"></i></a>
                            <a href=""><i class="fa fa-shopping-cart"></i></a>
                        </div> --}}
                    </div>
                    <div class="product-actions">
                        @auth
                            <add-to-cart :product="{{ json_encode($product) }}" :in-cart="{{ $inCart }}"></add-to-cart>
                            <button class="button-28" role="button">
                                <a href="{{ route('productDetails', ['id' => $product->id])}}">Details</a>
                            </button>
                        @endauth
                        @guest
                            <guest-to-cart :product="{{ json_encode($product) }}" :disabled="{{ isset(Cart::getContent()[$product->id]) ? json_encode(true) : json_encode(false) }}"></guest-to-cart>
                            <button class="button-28" role="button">
                                <a href="{{ route('guestProductDetails', ['id' => $product->id])}}">Details</a>
                            </button>
                        @endguest
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="pagination">
    {{$products->links('pagination::bootstrap-4')}}
</div>
