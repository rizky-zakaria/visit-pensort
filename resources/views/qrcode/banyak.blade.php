<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Voucher</title>
</head>

<body>
    {{-- <div class="row"> --}}
    <?php
        for ($i=0; $i < count($view); $i++) { 
    ?>
    {{-- <div class="col"> --}}
    <div class="card mt-3" style="width: 85.6mm; height: 53.98mm; border-color: black; border-width: 1px;">
        <div class="card-body">
            <div class="row d-flex justify-content-between">
                <div class="col">
                    <b>Voucher</b>
                </div>
                <div class="col"></div>
                <div class="col bg-light d-flex pb-3 justify-content-end">
                    {!! $view[$i] !!}
                    <br>
                </div>
            </div>
        </div>
        <span class="float-bottom">Pentadio Resort</span>
        <img src="{{ asset('img/bg.jpg') }}" width="322px" class="float-bottom" style="height: 100px">
    </div>
    {{-- </div> --}}

    <?php
        }
    ?>
    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script>
        window.print();
    </script>
</body>

</html>
