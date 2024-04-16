<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
</head>

<body>
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('test') }}">
        <button type="submit">Place Order</button>
    </form>
</body>

</html>