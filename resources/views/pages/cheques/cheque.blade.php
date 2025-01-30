@extends('layouts.app')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Post Dated Cheque</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Form row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted font-14">
                        Please fill out all required fields accurately.
                    </p>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="form-row-preview">
                            <form>
                                <div class="mb-3">
                                    <label for="customerName" class="form-label">Customer Name</label>
                                    <select id="customerName" class="form-select">
                                        <option>Select Customer Name</option>
                                        <option value="Alpha Corp">Alpha Corp</option>
                                        <option value="Beta Solutions">Beta Solutions</option>
                                        <option value="Gamma Industries">Gamma Industries</option>
                                        <option value="Delta Enterprises">Delta Enterprises</option>
                                        <option value="Epsilon LLC">Epsilon LLC</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="bankName" class="form-label">Bank</label>
                                    <select id="bankName" class="form-select">
                                        <option>Select Bank Name</option>
                                        <option value="Bank of Ceylon">Bank of Ceylon</option>
                                        <option value="Hatton National Bank">Hatton National Bank</option>
                                        <option value="Sampath Bank">Sampath Bank</option>
                                        <option value="Peoples Bank">Peoples Bank</option>
                                        <option value="Regional Development Bank">Regional Development Bank</option>
                                    </select>
                                </div>

                                <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="chequeNumber" class="form-label">Cheque Number</label>
                                        <input type="number" class="form-control" id="chequeNumber"
                                            placeholder="Enter Cheque Number">
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="mb-3 col-md-12">
                                        <label for="chequeAmount" class="form-label">Cheque Amount</label>
                                        <input type="number" class="form-control" id="chequeAmount"
                                            placeholder="Enter Cheque Amount">
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label for="postDate" class="form-label">Post Date</label>
                                    <input type="date" class="form-control" id="postDate">
                                </div>

                                <div class="mb-3">
                                    <label for="invoiceNumbers" class="form-label">Invoice Numbers</label>
                                    <input type="text" id="invoiceNumbers" class="form-control"
                                        placeholder="Invoice Numbers" readonly>
                                </div>

                                <div class="d-flex flex-wrap gap-2 mt-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div>
                            </form>
                        </div> <!-- end preview-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="col-12 col-md-12 col-lg-12 d-none" id="invoiceTableContainer">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="header-title mb-0">Cheques Details</h4>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Invoice Number</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Invoice Balance</th>
                                <th scope="col">Cheque Amount</th>
                            </tr>
                        </thead>
                        <tbody id="invoiceTableBody">
                            <!-- Invoice rows will be dynamically populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <script>
        const customerData = {
            "Alpha Corp": [{
                    invoiceNumber: "INV001",
                    date: "2023-01-15",
                    balance: 1000
                },
                {
                    invoiceNumber: "INV002",
                    date: "2023-01-20",
                    balance: 1500
                }
            ],
            "Beta Solutions": [{
                    invoiceNumber: "INV003",
                    date: "2023-02-10",
                    balance: 2000
                },
                {
                    invoiceNumber: "INV004",
                    date: "2023-02-15",
                    balance: 2500
                }
            ],
            "Gamma Industries": [{
                    invoiceNumber: "INV005",
                    date: "2023-03-05",
                    balance: 3000
                },
                {
                    invoiceNumber: "INV006",
                    date: "2023-03-10",
                    balance: 3500
                }
            ],
            "Delta Enterprises": [{
                    invoiceNumber: "INV007",
                    date: "2023-04-01",
                    balance: 4000
                },
                {
                    invoiceNumber: "INV008",
                    date: "2023-04-05",
                    balance: 4500
                }
            ],
            "Epsilon LLC": [{
                    invoiceNumber: "INV009",
                    date: "2023-05-01",
                    balance: 5000
                },
                {
                    invoiceNumber: "INV010",
                    date: "2023-05-10",
                    balance: 5500
                }
            ]
        };

        document.getElementById("customerName").addEventListener("change", function() {
            const selectedCustomer = this.value;
            const invoiceNumbersInput = document.getElementById("invoiceNumbers");
            const invoiceTableContainer = document.getElementById("invoiceTableContainer");
            const invoiceTableBody = document.getElementById("invoiceTableBody");

            if (selectedCustomer in customerData) {
                // Populate invoice numbers as comma-separated text
                invoiceNumbersInput.value = customerData[selectedCustomer].map(invoice => invoice.invoiceNumber)
                    .join(", ");

                // Populate invoice table
                invoiceTableBody.innerHTML = "";
                customerData[selectedCustomer].forEach(invoice => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${invoice.invoiceNumber}</td>
                        <td>${invoice.date}</td>
                        <td>${invoice.balance}</td>
                        <td><input type="text" class="form-control" value="${invoice.balance}"></td>
                    `;
                    invoiceTableBody.appendChild(row);
                });

                invoiceTableContainer.classList.remove("d-none");
            } else {
                invoiceNumbersInput.value = "";
                invoiceTableBody.innerHTML = "";
                invoiceTableContainer.classList.add("d-none");
            }
        });
    </script>
@endsection
