@extends('layout.mainlayout')
@section('content')

    <div class="container">

        <div class="show-container">
            <h3 class="product-title">{{ $product->product_name }}</h3>
        

            
                @if(!empty($product->factory_img))
                    <img src="{{ $product->factory_img }}" class="img-fluid"/>
                @elseif((!empty($product->upload_img)))
                    <img src="/storage/uploads/{{ $product->upload_img }}" class="show-image"/>
                @else

                @endif
        


            <div class="product-desc">
                <p>{{ $product->product_desc }}</p>
            </div>


            <div>
                <p>Hind {{ $product->product_price }} €</p>
            </div>

            @auth
                <p>Lisa kommentaar</p>
                <form method="POST" action="/products/comment/{{$product->id}}">
                    @csrf
                    <div class="form-row">
                     
                            <textarea class="form-control" id="comment-textarea" name="comment_body"></textarea>
                       
                    </div>
                    <input type="submit" class="btn btn-primary" value="submit">
                </form>
            @endauth

            <h4 class="comments">Kommentaarid</h4>

        
            <div class="comments" id="comments-textarea">
                @foreach($comments as $comment)
                    <p>{{$comment->body}}</p>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection



