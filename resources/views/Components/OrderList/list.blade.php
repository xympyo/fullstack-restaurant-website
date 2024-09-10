@extends('layouts.app')

<style>
    a {
        cursor: pointer;
    }

    td {
        font-size: .75rem;
    }
</style>

<div class="container-fluid outline mt-3" style="padding: 1rem;">
    <!-- All Orders of Today -->
    <div id="data1" class="p-2">
        <form method="post" action="{{ route('dashboard.list.update') }}">
            @csrf
            @method('post')
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Detail Order</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Time</th>
                        <th class="d-flex justify-content-center">Status</th>
                    </tr>
                </thead>
                <tbody id="data1" class="mt-3">
                    @foreach ($dataId as $index => $data)
                        <tr>
                            @if ($index === 0 || $dataCustName[$index] != $dataCustName[$index - 1])
                                <td style="border-top: 1px solid #95a1f9">{{ $dataNumber[$index] }}</td>
                            @else
                                <td style="border-top: 0"></td>
                            @endif
                            @if ($index === 0 || $dataCustName[$index] != $dataCustName[$index - 1])
                                <td style="border-top: 1px solid #95a1f9">{{ $dataCustName[$index] }}</td>
                            @else
                                <td></td>
                            @endif
                            <td style="border: 1px solid #95a1f9">
                                {{ $dataFoodName[$index] }}</td>
                            <td style="border: 1px solid #95a1f9">{{ $dataFoodQty[$index] }}</td>
                            <td style="border: 1px solid #95a1f9">Rp. {{ $dataFoodSubtotal[$index] }} k</td>
                            <td class="text-center" style="border: 1px solid #95a1f9;">
                                {{ $dataCreatedAt[$index] }}</td>
                            @if ($index === 0 || $dataCustName[$index] != $dataCustName[$index - 1])
                                <input type="hidden" name="index[]" value="{{ $dataId[$index] }}">
                            @else
                            @endif
                            @if ($index === 0 || $dataCustName[$index] != $dataCustName[$index - 1])
                                <td class="p-2">
                                    <select name="listUpdate[]" class="form-select form-select-sm">
                                        <option selected>{{ $custStatusToday[$index] }}</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Confirmed</option>
                                        <option value="3">Preparing</option>
                                        <option value="4" class="good-text">Completed</option>
                                        <option value="5" class="bad-text">Cancelled</option>
                                    </select>
                                </td>
                            @else
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container-fill d-flex flex-row-reverse mt-3">
                <button type="submit" class="btn btn-primary">Save Status</button>
            </div>
        </form>
    </div>
</div>
