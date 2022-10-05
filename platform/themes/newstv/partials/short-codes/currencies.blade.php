<?php

$currencies = Theme\NewsTv\Models\CurrencyAPI::all();
$flags=[
    'USD'=>'fg-16 fg-us ',
    'SAR'=>'fg-16 fg-sa ',
    'JOD'=>'fg-16 fg-jo ',
    'EUR'=>'fg-16 fg-eu ',
    'CAD'=>'fg-16 fg-ca ',
    'AED'=>'fg-16 fg-ae ',
];
?>
<style>
    /* Table Styles */

    .table-wrapper {
        /* margin: 10px 70px 70px; */
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }
    span.fg-16 {
    margin-bottom: -4px;
    display: inline-block;
}
    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #56180d;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }
</style>
@if ($currencies)
    <h2>اسعار العملات اليوم</h2>
    <h4>مقابل الدينار التونسي </h4>
    <div class="">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>العملة</th>
                    <th>القيمة</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $lastUpdate='';
                @endphp
                @foreach ($currencies as $item)
                    <tr>
                        <td>
                            <div class="Flag site-float">
                                {{ $item->code }}  <span class="{{$flags[$item->code]}}"></span>
                            </div>
                        </td>
                        <td>{{ $item->value }}</td>

                    </tr>
                    @php
                        $lastUpdate= $item->updated_at;
                    @endphp
                @endforeach
                <tr>
                    <td>اخر تحديث</td>
                    <td>{{$lastUpdate}}</td>

                </tr>
            <tbody>
        </table>
    </div>
@else
@endif
