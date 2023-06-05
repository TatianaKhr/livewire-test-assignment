@extends('layouts.app')

@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Book </h1>
                <p class="lead text-muted">Discover Your Perfect Book!</p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="col-md-6 mx-auto">
                    <div class="card box-shadow">
                        <div class="card-body">
                            <figure class="effect-ming">
                                <a href="{{ route('book.show', ['book' => $book->id]) }}" style="color:inherit;">
                                    <img class="card-img-top img-fluid"
                                         src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnkG27EQKr9mvUoikVSxjg5r7pzZSw3Zl8Pg&usqp=CAU"
                                         alt=" book cover">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div>
                                            <h2>{{$book->title}}
                                        </div>
                                    </div>
                                </a>
                            </figure>
                            <p class="card-text">{{ $book->description }}</p>
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Rating : {{ $book->rating }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('comment', ['bookId' => $book->id])
            </div>
        </div>
    </main>
@endsection
