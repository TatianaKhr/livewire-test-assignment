@extends('layouts.app')

@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Book catalog </h1>
                <p class="lead text-muted"> Discover the perfect book at our bookstore.</p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($books as $book)
                        <div class="col-md-4">
                            <div class="card box-shadow">
                                <div class="card-body">
                                    <figure class="effect-ming">
                                        <a href="{{ route('book.show', ['book' => $book->id]) }}"
                                           style="color:inherit;">
                                            <img class="card-img-top img-fluid"
                                                 src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnkG27EQKr9mvUoikVSxjg5r7pzZSw3Zl8Pg&usqp=CAU"
                                                 alt=" book cover">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div>
                                                    <h2>{{ $book->title }}
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                    <p class="card-text"
                                       style="width:auto; height: 100px">{{ Str::limit($book->description, 150, '...') }}</p>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Rating : {{ $book->rating }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
