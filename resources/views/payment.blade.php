<!-- resources/views/payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Page</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body {
    font-family: 'Roboto', sans-serif;
    background: url('{{ asset("images/hero1.png") }}') center/cover no-repeat;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card0 {
    display: flex; width: 900px;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    color: #000; overflow: hidden;
}
#sidebar-wrapper { width: 200px; background: rgba(255,255,255,0.3); color: #000; min-height: 100%; }
#sidebar-wrapper .sidebar-heading { font-weight: bold; padding: 20px; text-align: center; border-bottom: 1px solid rgba(0,0,0,0.1);}
.list-group-item { background: transparent; border: none; color: #000; cursor: pointer; transition: all 0.3s; }
.list-group-item:hover, .active1 { background: rgba(0,0,0,0.1); font-weight: bold; }
#page-content-wrapper { flex: 1; padding: 30px; }
#border-btm { border-bottom: 1px solid rgba(0,0,0,0.1); margin-bottom: 20px; padding-bottom: 10px; }
.top-highlight { color: #007bff; font-weight: bold; font-size: 20px; }
.form-card { background: rgba(255,255,255,0.6); padding: 30px; border-radius: 15px; margin-top: 20px; color: #000; }
.input-group { position: relative; margin-bottom: 25px; }
.input-group input { width: 100%; padding: 15px; border-radius: 12px; border: none; outline: none; background: rgba(255,255,255,0.9); color: #000; font-size: 16px; }
.input-group label { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #555; pointer-events: none; transition: all 0.3s ease; }
.input-group input:focus + label, .input-group input:not(:placeholder-shown) + label { top: -10px; font-size: 12px; color: #007bff; background: rgba(255,255,255,0.6); padding: 0 5px; border-radius: 4px; }
.btn-success { width: 100%; padding: 14px; border-radius: 10px; border: none; font-weight: bold; font-size: 1rem; background: #007bff; color: #fff; }
#qr img { border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.3); }
</style>
</head>
<body>

<div class="card0">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="sidebar-heading">PAY WITH</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item tabs active1" data-tab="menu1"><i class="fa fa-university me-2"></i>Bank</a>
            <a class="list-group-item tabs" data-tab="menu2"><i class="fa fa-credit-card me-2"></i>Card</a>
            <a class="list-group-item tabs" data-tab="menu3"><i class="fa fa-qrcode me-2"></i>Visa QR</a>
        </div>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="row" id="border-btm">
            <div class="col-6"><p>customer@email.com</p></div>
            <div class="col-6 text-end">
           <p>Pay <span class="top-highlight">₹{{ $total }}</span></p>
<button type="submit" class="btn btn-success">Pay ₹{{ $total }}</button>
</div>
            
        </div>

        <!-- Tab content -->
        <div class="tab-content">
            <!-- Bank -->
            <div id="menu1" class="tab-pane active">
                <div class="form-card">
                    <h3 class="text-center">Enter bank details</h3>
                    <form onsubmit="event.preventDefault()">
                        <div class="input-group">
                            <input type="text" required placeholder=" " id="bankName">
                            <label for="bankName">Bank Name</label>
                        </div>
                        <div class="input-group">
                            <input type="text" required placeholder=" " id="beneficiary">
                            <label for="beneficiary">Beneficiary Name</label>
                        </div>
                        <div class="input-group">
                            <input type="text" required placeholder=" " id="swift">
                            <label for="swift">SWIFT Code</label>
                        </div>
                        <button type="submit" class="btn btn-success">Pay ₹{{ $total }}</button>
                    </form>
                </div>
            </div>

            <!-- Card -->
            <div id="menu2" class="tab-pane" style="display:none;">
                <div class="form-card">
                    <h3 class="text-center">Enter card details</h3>
                    <form onsubmit="event.preventDefault()">
                        <div class="input-group">
                            <input type="text" required placeholder=" " id="cardNumber">
                            <label for="cardNumber">Card Number</label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group">
                                    <input type="text" required placeholder=" " id="expiry">
                                    <label for="expiry">Expiry (MM/YY)</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <input type="password" required placeholder=" " id="cvv">
                                    <label for="cvv">CVV</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Pay ₹{{ $total }}</button>
                    </form>
                </div>
            </div>

            <!-- QR -->
            <div id="menu3" class="tab-pane" style="display:none;">
                <div class="form-card text-center">
                    <h3>Scan the QR code</h3>
                    <div id="qr">
                        <img src="{{ asset('images/QR.png') }}" width="200" height="200" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    $('.tabs').click(function(){
        var tabId = $(this).data('tab');
        $('.tabs').removeClass('active1');
        $(this).addClass('active1');
        $('.tab-pane').hide();
        $('#' + tabId).show();
    });
});
</script>
</body>
</html>
