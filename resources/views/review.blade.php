@extends('layouts.nav')
@section('title', 'Отзывы')
@section('style')
    <link rel="stylesheet" href="/css/general.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/review.css">
@endsection
@section('content')
    <div class="conteiner">
        <h1 class="title">Отзывы к товару: {{ $product[0]->name }}</h1>
        <div class="reviews">
            <div class="reviews__left">
                <div class="info" style="background-image: url({{ $product[0]->photo }})">

                    {{-- <img src="{{ $product[0]->photo }}" alt="img"> --}}
                </div>
                @if (auth()->user() != null && count($leaveAReview) != 0)
                    <form method="POST" action="{{ route('addReview') }}" id="formReview"
                        data-user="{{ auth()->user()->id }}" data-product="{{ $product[0]->id }}">
                        @csrf
                        <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="product" value="{{ $product[0]->id }}">
                        <textarea class="textReview" name="text" id="text-review" cols="30" rows="10"
                            placeholder="Поделитесь своим мнением о продукте"></textarea>
                        <br>

                        <button type="submit" class="reviews__btn">Оставить отзыв</button>
                    </form>
                @elseif(auth()->user() != null && count($leaveAReview) == 0)
                    <h2 style="font-size: 20px; color: gray; font-weight: 300; padding-top: 20px;">Чтобы оставить отзыв, вам
                        необходимо заказть данный товар и дождаться его получения </h2>
                @else
                    <h2 style="font-size: 20px; color: gray; font-weight: 300; padding-top: 20px;">Чтобы оставить отзыв, вам
                        необходимо <a href="{{ route('login') }}">войти</a> </h2>
                @endif
            </div>
            <div class="reviews__right">
                @if (!empty($reviews))
                    @foreach ($reviews as $review)
                        <div class="reviews__review">
                            <h4 class="review__name">{{ $review->user }}</h4>
                            <p class="review__date">{{ $review->date_making }}</p>
                            <p>{{ $review->text }}</p>
                        </div>
                    @endforeach
                @else
                    <h2 style="font-size: 20px; color: gray; font-weight: 300;" class="noReviews">Вы можете стать первым,
                        кто оставит отзыв о продукте</h2>
                @endif
            </div>
        </div>

        <script>
            $('#formReview').on('submit', function(event) {
                event.preventDefault();
                let data = $('#formReview').serialize();
                let user = $(this).data('user');
                let product = $(this).data('product');
                let text = $('#text-review').val();
                $.ajax({
                    url: "{{ route('addReview') }}",
                    type: "POST",
                    data: data,
                    success: function(result) {
                        //             $('.reviews__right').prepend(`<div class="reviews__review">
                //     <h4 class="review__name">` + result.user + `</h4>
                //     <p class="review__date">` + result.date + `</p>
                //     <p>` + result.text + `</p>
                // </div>`)
                        $('.reviews__right').prepend(`<p class="moderation">Отзыв отправлен на модерацию</p>`)
                        $('.noReviews').css('display', 'none')
                    },
                })
            })
        </script>
    @endsection
