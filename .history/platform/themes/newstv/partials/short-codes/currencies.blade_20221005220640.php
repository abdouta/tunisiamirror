<?php

$currencies = Theme\NewsTv\Models\CurrencyAPI::all();

?>
@if ($currencies)
    <h2>اسعار العملات اليوم</h2>
    <h4>مقابل الدينار التونسي  </h4>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>العملة</th>
                    <th>القيمة</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($currencies as $item)
                <tr>
                    <td>{{$item->code}}</td>
                    <td>{{$item->value}}</td>

                </tr>
                @endforeach

                <tr>
                    <td>اخر تحديث</td>
                    <td>Content 1</td>

                </tr>
            <tbody>
        </table>
    </div>
@else
@endif
