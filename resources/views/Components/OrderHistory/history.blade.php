<style>
    td {
        font-size: .75rem;
    }
</style>

<div class="container-fluid outline" style="padding: 1rem;">
    <table style="width: 100%; ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Food Name</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody class="mt-3">
            @foreach ($custId as $index => $data)
                <tr>
                    @if ($index === 0 || $custName[$index] != $custName[$index - 1])
                        <td>{{ $data }}</td>
                    @else
                        <td></td>
                    @endif
                    @if ($index === 0 || $custName[$index] != $custName[$index - 1])
                        <td>{{ $custName[$index] }}</td>
                    @else
                        <td></td>
                    @endif
                    @if ($index === 0 || $custName[$index] != $custName[$index - 1])
                        <td>{{ $custPhone[$index] }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $custFood[$index] }}</td>
                    <td>{{ $custQty[$index] }}</td>
                    <td>{{ $custTotalRupiah[$index] }}</td>
                    <td>{{ $custDate[$index] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
