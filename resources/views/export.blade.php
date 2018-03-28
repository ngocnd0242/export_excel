<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Export DB</title>

    <style>
        form, .biz-menz, .douce-cdb {
            padding: 20px 0px;
        }

        .hidden {
            display: none;
        }

        .btn {
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <form id="export" action="{{ route('export') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group row">
            <div class="col-sm-4">
                <label>Database</label>
                <select class="form-control" name="database" id="database">
                    <option value="pgsql_biz_menz">biz-menz</option>
                    <option value="pgsql_douce_cdb">douce-cdb</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label>Limit</label>
                <select class="form-control" name="limit">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="1000">1000</option>
                </select>
            </div>

            <div class="col-sm-4">
                <button type="submit" class="btn btn-success" id="start-export">Export Excel</button>
            </div>
        </div>
        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>error</h4>
                {{ Session::get('error') }}
            </div>
        @endif


        <div class="biz-menz">
            <div class="row">
                <h3>Biz Database</h3>
            </div>
            <div class="row">
                @foreach($tablesBizMenzs as $tablesBizMenz)
                    <div class="col-sm-3">
                        <input type="checkbox" class="form-check-input" name="{{ $tablesBizMenz->table_name }}">
                        {{ $tablesBizMenz->table_name }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="douce-cdb hidden">
            <div class="row">
                <h3>Douce Database</h3>
            </div>
            <div class="row">
                @foreach($tablesDouceCdbs as $tablesDouceCdb)
                    <div class="col-sm-3">
                        <input type="checkbox" class="form-check-input" name="{{ $tablesDouceCdb->table_name }}">
                        {{ $tablesDouceCdb->table_name }}
                    </div>
                @endforeach
            </div>
        </div>


    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#database').change(function () {
            var connection = $(this).val();

            if (connection === 'pgsql_douce_cdb') {
                $('.biz-menz').addClass('hidden');
                $('.douce-cdb').removeClass('hidden');
            } else {
                $('.douce-cdb').addClass('hidden');
                $('.biz-menz').removeClass('hidden');
            }
        });
    });
</script>
</body>
</html>