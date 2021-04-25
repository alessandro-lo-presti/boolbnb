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
                <table class="table bordo_tabella">
                    <thead>
                        <tr>
                            <th scope="col">Contatto</th>
                            <th scope="col">Ricevuto il</th>
                            <th scope="col" colspan="2" class="text-center">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->date }}</td>
                            <td class="read text-center">
                                <button class ="btn btn-success">
                                    <a href="#">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </a>
                                </button>
                            </td>
                            <td class="del text-center">
                                <form action="#" method='post'>
                                    @csrf
                                    @method('delete')
                                    <div class="form-group">
                                        <input class="btn btn-danger" value="&#xf2ed;" type="submit">
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

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
