<?php

$currencies = Theme\NewsTv\Models\CurrencyAPI::all();

?>
@if ($currencies)
    <h2>Responsive Table</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                    <th>Header 4</th>
                    <th>Header 5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                </tr>

            <tbody>
        </table>
    </div>
@else
@endif
