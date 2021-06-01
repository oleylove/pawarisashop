<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    @font-face {
        font-family: 'Sarabun';
        font-style: normal;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabun.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'Sarabun';
        font-style: normal;
        font-weight: bold;
        src: url("{{ asset('fonts/THSarabun Bold.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'Sarabun';
        font-style: italic;
        font-weight: normal;
        src: url("{{ asset('fonts/THSarabun Italic.ttf') }}") format('truetype');
    }

    @font-face {
        font-family: 'Sarabun';
        font-style: italic;
        font-weight: bold;
        src: url("{{ asset('fonts/THSarabun Bold Italic.ttf') }}") format('truetype');
    }

    body {
        font-family: "Sarabun";
        font-size: 16px;
        justify-content: center;
        background-color: white;

    }

    @page {
        size: A6;
        padding: 1mm;
    }

    @media print {

        html,
        body {
            width: 105mm;
            height: 148mm;
        }
    }

    .font-table {
        font-family: "Sarabun";
        font-size: 20px;

    }

    .table thead tr th {
        color: #555;
        font-size: 16px;
        padding: 0 0;

    }

    .table tbody tr td {
        padding: 1mm;
    }

    .font-title {
        font-family: "Sarabun";
        font-size: 20px;
    }
</style>

<body>
    <span class="font-title font-weight-bold">
        {{ 'กรุณาส่ง : ' }}
    </span><br>
    <span class="font-title font-weight-bold">
        {{ $order->address }}
    </span>
    <table class="table tablesorter table-sm">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-left">สินค้า</th>
                <th class="text-center">จำนวน</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderproduct as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-left">
                    {{ $item->product->name }}
                </td>
                <td class="text-center">
                    {{ $item->qty }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
