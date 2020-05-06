<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peminjaman-{{ $user->name }}-{{ $transaction->code_transaction }}</title>

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

</head>
<body>
    <table class="table">
        <thead class="bg-primary text-white text-center">
            <tr>
                <th colspan="2">
                    Loan_Code : {{ $transaction->code_transaction }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="font-weight-bold">
                <td>Borrower</td>
                <td>Book</td>
            </tr>
            <tr>
                <td>{{ $user->name }} / {{ $user->class }} - {{ $user->majors }}</td>
                <td>{{ $book->name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
