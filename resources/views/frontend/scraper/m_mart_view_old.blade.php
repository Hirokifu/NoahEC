
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0 bd-example">



{{-- Mマートの国産牛肉・水産品スクラッピング --}}

<div class="body-content">
    <div class="container">

    <div class="row">
        <div class="col-md-3 mt-5 wrapper">
            Meat Menu
        </div>

        <div class="col-md-9 mt-5 wrapper">

            @foreach ($data as $key => $value)
            <div>
                <h5 class="card-header">{{ $key }}</h5>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">項目</th>
                            <th scope="col">内容</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">単価</th>
                            <td>{{ $value['spec'][0] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">販売最小ロット</th>
                            <td>{{ $value['spec'][1] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">生(原)産地</th>
                            <td>{{ $value['spec'][2] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">加工地</th>
                            <td>{{ $value['spec'][3] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">形態</th>
                            <td>{{ $value['spec'][4] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">荷姿</th>
                            <td>{{ $value['spec'][5] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">サイズ</th>
                            <td>{{ $value['spec'][6] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">賞味期限</th>
                            <td>{{ $value['spec'][7] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">納期/発送体制</th>
                            <td>{{ $value['spec'][8] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">運送費</th>
                            <td>{{ $value['spec'][9] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">納入実績</th>
                            <td>{{ $value['spec'][10] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">参考メニュー</th>
                            <td>{{ $value['spec'][11] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">備考</th>
                            <td>{{ $value['spec'][12] }}</td>
                        </tr>
                        {{-- <tr>
                            <th scope="row">原材料、食品添加物</th>
                            <td>{{ $value['spec'][13] }}</td>
                        </tr>
                        <tr>
                            <th scope="row">*</th>
                            <td>{{ $value['spec'][18] }}</td>
                        </tr> --}}
                    </tbody>
                </table>

            </div>
            @endforeach

        </div>

        {{-- <div class="col-md-2 mt-5 wrapper">

        </div> --}}

    </div>

    </div>
</div>

</body>
</html>
