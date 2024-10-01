@props([
	'title',
	'h1' => null	
])

    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        @vite(['resources/css/app.scss'])
    </head>
    <body>
        <header>
            <div class="container border-bottom pb-2">
                <div class="row g-4">
                    <div class="col"><a href="/">Logo</a></div>
                    <div class="col">
                        Auth
                    </div>
                </div>

            </div>
        </header>
        <div>
            <div class="container py-2">
                <div class="row">
                    <div class="col col-3">
                        <div class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('cars.index') }}">Cars</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('brands.index') }}">Brands</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            @auth
                                <li class="list-group-item">
                                    <a href="{{ route('account.index') }}">Logout</a>
                                </li>
                            @else
                                <li class="list-group-item">
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                        </div>
                    </div>
                    <div class="col col-9">
                        @if(session('alert'))
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <div>
                                    {{ session('alert') }}
                                </div>
                            </div>
                        @endif
                        <h1>{{ $h1 }}</h1>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container border-top pt-2">
                Footer
            </div>
        </footer>
        @vite(['resources/js/app.js'])
    </body>
</html>
