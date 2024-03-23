<html>
<head>
    <title>Transactions</title>
</head>
<body>
    <ul>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Product</th>
                <th>Qty</th>
            </tr>
        @foreach($transactions as $transaction)
            <!-- id, name, product, qty -->
            <tr>
                <td>{{ $transaction['id'] }}</td>
                <td>{{ $transaction['name'] }}</td>
                <td>{{ $transaction['product'] }}</td>
                <td>{{ $transaction['qty'] }}</td>
            </tr>
        @endforeach
        </table>
        <style>
            table {
                width: 30%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </ul>
</html>
