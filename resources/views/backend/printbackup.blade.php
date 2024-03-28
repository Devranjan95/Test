<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        /* #top-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
        }
        #top-section img {
            max-height: 80px;
            max-width: 200px;
        } */
        #top-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #4CAF50;
            color: #fff;
            padding: 20px;
            position: relative; /* Add this line */
        }

#top-section button {
    position: absolute;
    top: 30%;
    right: 20px;
    transform: translateY(-50%);
    background-color: transparent;
    color: #fff;
    border: 2px solid #fff;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s, color 0.3s;
}

    #top-section button:hover {
        background-color: #fff;
        color: #4CAF50;
    }
        #middle-section {
            background-color: #fff;
            flex: 1;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }
        #bottom-section {
            /* background-color: #4CAF50; */
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        footer {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: auto;
            padding-top: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        /* .total {
            font-weight: bold;
            color: #333;
            text-align: right;
            margin-top: 20px;
        } */
        .total {
        font-weight: bold;
        color: #333;
        text-align: right; /* Updated property */
        margin-top: 20px;
    }
  
        #totalPrice {
            font-size: 24px;
        }
        #printButton {
            display: block;
            margin: 20px auto;
            padding: 15px 30px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        

        @media print {
            body {
                margin: 0;
                padding: 20px;
            }
            #middle-section {
                /* margin-top:-120px; */
                max-width: 100%;
                margin: 0;
                padding: 20px;
                box-shadow:none
            }
            /* #printButton {
                display: none;
            } */
            /* #top-section {
                position: fixed;
                top: 0;
                width: 100%;
            } */
            /* #top-section img {
                max-height: 60px; 
                margin-right: 20px;
            }
            #top-section button {
                 display: none;
            } */
            #top-section{
                display:none;
            }
            #bottom-section{
                display:none;
            }
            footer {
                display: none;
            }
            .tokenCheckbox{
                display:none;
            }
            #delete {
            display:none;
        }
            
           
        }
    </style>
</head>
<body>
    <!-- *************** -->
    
<div id="top-section">
    <div>
        <img src="{{asset('assets/images/llogo.svg')}}" alt="Company Logo" style='width:45px;height:45px'>
        <span>Laravel Diagnostics</span>
    </div>
    <div>
        <button onclick="printBill()" id="printButton" class="btn btn-success">Print Bill</button>
    </div>
</div>

<div id="middle-section">
    <h2><img src="{{asset('assets/images/llogo.svg')}}" alt="Company Logo" style='width:25px;height:25px'>Billing Information</h2>

    <table>
        <tr>
            <th>Patient Name</th>
            <td>{{$patdetails->pat_name}}</td>
        </tr>
        <tr>
            <th>Registration Number</th>
            <td><input type="hidden" id='reg' value='{{$patdetails->pat_regno}}'/>{{$patdetails->pat_regno}}</td>
        </tr>
        <tr>
            <th>Current Date</th>
            <td id="currentDate"></td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <!-- <th class='d'></th> -->
                <th>Token Number</th>
                <th>Test Category</th> 
                <th>Test Subcategory</th> 
                <th>Test Name</th>
                <th>Test Price</th>
                <th>Discount</th>
                <th>Final Price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tokdetails as $key => $tok)
    <tr>
        <td>{{ $tok->tok_no }}</td>
        <td>{{ $tinfo[$key]['category'] }}</td>
        <td>{{ $tinfo[$key]['subcat'] }}</td>
        <td>{{ $tinfo[$key]['test'] }}</td>
        <td>{{ $tinfo[$key]['tprice'] }}</td>
        <td>{{ $tinfo[$key]['discount'] }}</td>
        <td class="test-price">{{ $tinfo[$key]['fprice'] }}</td>
        <!-- Add other columns as needed -->
    </tr>
    @endforeach
        </tbody>
    </table>
   
    

    <h3 class="total">Total Price: <span id="totalPrice"></span></h3>
    
</div>


<div id="bottom-section">
    <div style="text-align: center; margin-top: 20px;">
        <button class="btn btn-primary" onclick="goBack()">Back</button>
    </div>
    <footer>
        <p>Company Address</p>
        <p>Email: your@email.com | Contact: +123 456 7890</p>
        <p>Opening Hours: Mon-Fri 9:00 AM - 6:00 PM</p>
    </footer>
    
</div>

<!-- <button onclick="printBill()" id="printButton">Print Bill</button> -->

<script>
    // Set current date
    const currentDateElement = document.getElementById('currentDate');
    const today = new Date();
    currentDateElement.textContent = today.toISOString().split('T')[0];

    // Calculate and display total price
    function calculateTotal() {
        const totalPriceElement = document.getElementById('totalPrice');
        const total = Array.from(document.querySelectorAll('.test-price'))
            .reduce((acc, el) => acc + parseFloat(el.textContent), 0);
        totalPriceElement.textContent = total.toFixed(2);
        showPrintButton();
    }

    // Show print button
    function showPrintButton() {
        const printButton = document.getElementById('printButton');
        printButton.style.display = 'block';
    }

    // Trigger showPrintButton on page load
    showPrintButton();
    calculateTotal();
    // Print the bill
    function printBill() {
        window.print();
    }

    function goBack() {
    window.history.back();
}

// Function for hold


    
</script>

</body>
</html>
