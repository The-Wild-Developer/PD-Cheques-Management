@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Check List</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Form row -->
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Mark Cheques</h4>
                    <div class="d-flex gap-1">
                        <div>
                            <div class="date-selector">
                                <input type="date" class="form-control form-control-sm" id="date-picker" />
                            </div>
                        </div>
                        <div>
                            <select class="form-select form-select-sm" id="bank-selector">
                                <option value="" selected>All Banks</option>
                                <option value="Bank of Ceylon">Bank of Ceylon</option>
                                <option value="Hatton National Bank">Hatton National Bank</option>
                                <option value="Sampath Bank">Sampath Bank</option>
                                <option value="Peoples Bank">Peoples Bank</option>
                                <option value="Regional Development Bank">Regional Development Bank</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Cheque Number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="cheque-table-body">
                                @for ($i = 1; $i <= 10; $i++)
                                    <tr>
                                        <td>{{ ['Bank of Ceylon', 'Hatton National Bank', 'Sampath Bank', 'Peoples Bank', 'Regional Development Bank'][rand(0, 4)] }}
                                        </td>
                                        <td>CA00{{ $i }}</td>
                                        <td>{{ now()->addDays($i)->format('Y-m-d') }}</td>
                                        <td>
                                            <span class="text-info fw-semibold">
                                                {{ number_format(rand(50000, 150000), 2) }}</span>
                                        </td>
                                        <td><input type="checkbox" /></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

    </div>
    <!-- end row -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('cheque-table-body');
            const bankSelector = document.getElementById('bank-selector');
            const datePicker = document.getElementById('date-picker');

            function filterTable() {
                const selectedBank = bankSelector.value;
                const selectedDate = datePicker.value;
                const rows = tableBody.getElementsByTagName('tr');

                for (const row of rows) {
                    const bank = row.children[0].textContent.trim();
                    const date = row.children[2].textContent.trim();

                    const matchesBank = !selectedBank || bank === selectedBank;
                    const matchesDate = !selectedDate || date === selectedDate;

                    row.style.display = matchesBank && matchesDate ? '' : 'none';
                }
            }

            bankSelector.addEventListener('change', filterTable);
            datePicker.addEventListener('input', filterTable);
        });
    </script>
@endsection
