@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" disabled class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <span class="float-start m-2 me-4">
                        <img src="https://img.freepik.com/premium-photo/sales-manager-digital-avatar-generative-ai_934475-9076.jpg"
                            style="height: 100px;" alt="avatar image" class="rounded-circle img-thumbnail">
                    </span>
                    <div class="">
                        <h4 class="mt-1 mb-1">Lucas Anderson</h4>
                        <p class="font-16">Finance Manager</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12">
            <div class="card cta-box bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-center">
                        <div class="w-100 overflow-hidden">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0 text-reset mb-0 d-flex align-items-center">
                                    <i class=" uil-clock-three"></i>
                                </h3>
                                <span id="timeDisplay" class="ms-1">Loading time...</span>
                            </div>

                            <h3 class="m-0 fw-normal cta-box-title text-reset">Welcome to <b>PD CHEQUES MANAGEMENT</b> for
                                enhanced efficiency <img src="assets/images/wave.gif" alt="Icon"
                                    style="width: 35px; height: 35px; vertical-align: center;"></h3>
                        </div>
                        <img class="ms-3" src="assets/images/svg/email-campaign.svg" width="130" height="124"
                            alt="Generic placeholder image">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Upcoming Cheques</h4>
                    <div class="d-flex gap-1">
                        <div>
                            <select class="form-select form-select-sm" id="daterange-selector"
                                aria-label=".form-select-sm example">
                                <option value="7">7 Days</option>
                                <option value="14">14 Days</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0" id="cheques-table">
                            <thead>
                                <tr id="table-headers">
                                    <th scope="col">Bank</th>
                                    <th scope="col">2025/01/28</th>
                                    <th scope="col">2025/01/29</th>
                                    <th scope="col">2025/01/30</th>
                                    <th scope="col">2025/01/31</th>
                                    <th scope="col">2025/02/01</th>
                                    <th scope="col">2025/02/02</th>
                                    <th scope="col">2025/02/03</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <tr>
                                    <td>Bank of Ceylon</td>
                                    <td>500,000.00</td>
                                    <td>900,000.00</td>
                                    <td>250,000.00</td>
                                    <td>37,500.00</td>
                                    <td>800,000.00</td>
                                    <td>1,022,727.27</td>
                                    <td>1,200,000.00</td>
                                </tr>
                                <tr>
                                    <td>Hatton National Bank</td>
                                    <td>75,000.00</td>
                                    <td>135,000.00</td>
                                    <td>37,500.00</td>
                                    <td>5,625.00</td>
                                    <td>120,000.00</td>
                                    <td>153,409.09</td>
                                    <td>200,000.00</td>
                                </tr>
                                <tr>
                                    <td>Sampath Bank</td>
                                    <td>8,569,200.00</td>
                                    <td>15,424,560.00</td>
                                    <td>4,284,600.00</td>
                                    <td>642,690.00</td>
                                    <td>13,710,720.00</td>
                                    <td>17,527,909.09</td>
                                    <td>18,000,000.00</td>
                                </tr>
                                <tr>
                                    <td>Peoples Bank</td>
                                    <td>5,682,000.00</td>
                                    <td>10,227,600.00</td>
                                    <td>2,841,000.00</td>
                                    <td>426,150.00</td>
                                    <td>9,091,200.00</td>
                                    <td>11,622,272.73</td>
                                    <td>12,000,000.00</td>
                                </tr>
                                <tr>
                                    <td>Regional Development Bank</td>
                                    <td>3,605,555.00</td>
                                    <td>6,489,999.00</td>
                                    <td>1,802,777.50</td>
                                    <td>270,416.63</td>
                                    <td>5,768,888.00</td>
                                    <td>7,374,998.86</td>
                                    <td>8,000,000.00</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td><b>18,431,755.00</b></td>
                                    <td><b>33,177,159.00</b></td>
                                    <td><b>9,215,877.50</b></td>
                                    <td><b>1,382,381.63</b></td>
                                    <td><b>29,490,808.00</b></td>
                                    <td><b>37,701,317.05</b></td>
                                    <td><b>39,400,000.00</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('daterange-selector').addEventListener('change', function() {
            const days = parseInt(this.value, 10);
            const tableHeaders = document.getElementById('table-headers');
            const tableBody = document.getElementById('table-body');

            const today = new Date();
            today.setDate(today.getDate() + 1); // Start from tomorrow

            // Update headers
            tableHeaders.innerHTML = '<th scope="col">Bank</th>';
            for (let i = 0; i < days; i++) {
                const nextDate = new Date(today);
                nextDate.setDate(today.getDate() + i);
                const formattedDate = nextDate.toISOString().split('T')[0].replace(/-/g, '/');
                tableHeaders.innerHTML += `<th scope="col">${formattedDate}</th>`;
            }

            // Update rows
            const banks = [
                'Bank of Ceylon',
                'Hatton National Bank',
                'Sampath Bank',
                'Peoples Bank',
                'Regional Development Bank'
            ];
            const dummyValues = Array.from({
                length: days
            }, () => (Math.random() * 1000000).toFixed(2));

            tableBody.innerHTML = '';
            banks.forEach((bank) => {
                let rowHTML = `<tr><td>${bank}</td>`;
                dummyValues.forEach((value) => {
                    rowHTML += `<td>${value}</td>`;
                });
                rowHTML += '</tr>';
                tableBody.innerHTML += rowHTML;
            });

            // Add total row
            let totalRowHTML = '<tr><td><b>Total</b></td>';
            for (let i = 0; i < days; i++) {
                const columnTotal = banks.length * parseFloat(dummyValues[i]);
                totalRowHTML += `<td><b>${columnTotal.toFixed(2)}</b></td>`;
            }
            totalRowHTML += '</tr>';
            tableBody.innerHTML += totalRowHTML;
        });
    </script>
@endsection
