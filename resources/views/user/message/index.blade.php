@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
    <title>Document</title>
</head>
<body>
    @include('partials.header')
    <div id="message">

        <div class= "container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col-2">Email</th>
                            <th scope="col-2">Testo</th>
                            <th scope="col-2">Ricevuto il</th>
                            <th scope="col-2">Vedi Messaggio</th>
                            <th scope="col-2">Cancella</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($message as $mess)
                            <tr>

                                <td><a href="{{ route('apartment.show', $apartment->id) }}">{{ $apartment->title }}</a>
                                </td>
                                <td>{{ $apartment->n_rooms }}</td>
                                <td>{{ $apartment->n_beds }}</td>
                                <td>{{ $apartment->n_bathrooms }}</td>
                                <td>{{ $apartment->address }}
                                    {{ $apartment->city }}</td>
                                    <td class="mex">
                                        <a href="{{route('send')}}"><input class="btn btn-primary" value="&#xf086;" type="submit"></a></td>
                                <td class="del">
                                    <form action="{{ route('apartment.destroy', $apartment->id) }}" method='post'>
                                        @csrf
                                        @method('delete')
                                        <div class="form-group">
                                            <input class="btn btn-danger" value="&#xf2ed;" type="submit">
                                        </div>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody> --}}

                </table>
            </div>
        </div>
        
        @include('partials.footer')

    </div>

    <script src="{{ asset('js/message.js') }}"></script>
</body>
</html>



{{-- ● 2,99 € per 24 ore di sponsorizzazione
● 5.99 € per 72 ore di sponsorizzazione
● 9.99 € per 144 ore di sponsorizzazione --}}
