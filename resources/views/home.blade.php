<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <title>Saderības metrs</title>

        <script>
            var config = {
                'target': '{{ route('store') }}',
                'csrfToken': '{{ csrf_token() }}'
            };
        </script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h2>Pārbaudi saderību ar kādu*</h2>
                            <h5>Valentīndienas balle 16. februārī Zeļļu ielā 25 22:00</h5>
                            <p>Ja meklē drosmi kādu aicināt uz balli, meklē to random lapā internetā!</p>
                            <form id="magic">
                                <div class="form-group">
                                    <label for="name1">Pirmās pusītes vārds</label>
                                    <input type="text" class="form-control" id="name1" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label for="name2">Otrās pusītes vārds</label>
                                    <input type="text" class="form-control" id="name2" placeholder="" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block btn-measure">Maģija</button>
                                <div class="progress active" id="indicator" style="height: 38px">
                                    <div class="progress-bar progress-bar-striped bg-pink" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </form>
                            <small>*vai sapāro tos, kam, tavuprāt, jābūt kopā un liec viņiem justies neērti, parādot rezultātu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-27184191-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-27184191-4');
    </script>
    </body>
</html>
